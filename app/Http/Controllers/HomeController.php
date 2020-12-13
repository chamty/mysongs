<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
      $user_id = Auth::id();
      $songs = App\Songs::where('user_id', $user_id);
      $repertoires = $songs->where('status', 'repertoire');
      return view('index', ['songs' => $songs->songs, 'repertoires' => $repertoires]);
    }
}
