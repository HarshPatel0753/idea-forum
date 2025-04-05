<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class IdeaController extends Controller
{
    public function index() {
        $ideas = Idea::where('user_id','=',Auth::user()->id)->paginate(5);
        return view('idea.index')->with(['ideas' => $ideas]);
    }

    public function form() {
        return view('idea.form');
    }

    public function view(Idea $idea) {
        $likes = json_decode($idea->likes) ?? 0;
        $comments = Comment::query()
        ->join('users','users.id','=','comments.user_id')
        ->where('idea_id','=',$idea->id)
        ->select([
            'comments.text as text',
            'users.first_name as first_name',
            'users.last_name as last_name',
            DB::raw('DATE_FORMAT(comments.created_at,"%d-%m-%y %h:%i %a") as date')
        ])
        ->orderBy('comments.created_at')
        ->get();
        return view('idea.view')->with([
            'idea'=>$idea,
            'likes' => $likes !== 0 ? count($likes) : $likes,
            'comments' => $comments
        ]);
    }

    public function like(Idea $idea) {
        $user_id = Auth::user()->id;
        $likes = $idea->likes ?? json_encode([]);
        $likes = json_decode($likes);

        if(in_array($user_id,$likes)){
            $key = array_keys($likes,$user_id);
            array_splice($likes,$key[0],1);
            $idea->likes = $likes;
            $idea->save();
            return redirect()->route('idea.view',$idea->id);
        }

        $idea->likes = array_merge($likes,[$user_id]);
        $idea->save();
        return redirect()->route('idea.view',$idea->id);
    }

    public function comment(Request $request,Idea $idea) {
        $request->validate([
            "text" => 'required|string',
        ]);
        Comment::create([
            'idea_id' => $idea->id,
            'user_id' => Auth::user()->id,
            'text' => $request->text,
        ]);
        return redirect()->route('idea.view',$idea->id);
    }

    public function edit(Idea $idea) {
        return view('idea.edit')->with(['idea' => $idea]);
    }

    public function createOrUpdate(Request $request) {
        $validated = $request->validate([
            "title" => 'required|string',
            "text" => 'required|string',
        ]);
        $validated['user_id'] = Auth::user()->id;

        Idea::updateOrCreate(['id' => $request->id],$validated);

        return redirect()->route('idea.index');
    }

    public function destroy(Idea $idea)
    {
        $idea->delete();
        return redirect()->route('idea.index');
    }
}
