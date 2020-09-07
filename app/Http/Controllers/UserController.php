<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index ()
    {
      $auth = Auth::user();
      return view('user.index', ['auth => $auth']);
    }
}
