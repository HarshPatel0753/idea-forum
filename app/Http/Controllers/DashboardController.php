<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard() {
        $ideas = Idea::where('user_id','!=',Auth::user()->id)->get();
        return view('dashboard')->with(['ideas' => $ideas]);
    }
}
