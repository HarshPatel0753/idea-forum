<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    public function index() {
        $ideas = Idea::where('user_id','=',Auth::user()->id)->paginate(5);
        return view('idea.index')->with(['ideas' => $ideas]);
    }

    public function form() {
        return view('idea.form');
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
