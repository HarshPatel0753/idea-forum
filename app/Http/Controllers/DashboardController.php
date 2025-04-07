<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard() {
        $ideas = Idea::query()
        ->join('users','users.id','=','ideas.user_id')
        ->where('user_id','!=',Auth::user()->id)
        ->select([
            'ideas.id as id',
            'ideas.title as title',
            'ideas.text as text',
            'users.first_name as first_name',
            'users.last_name as last_name',
            DB::raw('DATE_FORMAT(ideas.created_at,"%d-%m-%y %h:%i %a") as date')
        ])
        ->orderBy('users.created_at')
        ->get();

        return view('dashboard')->with(['ideas' => $ideas]);
    }
}
