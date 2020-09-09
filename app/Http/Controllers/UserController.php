<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index ()
    {
      $auth = Auth::user();
      return view('user.index', ['auth' => $auth]);
    }

    public function edit()
    {
        $auth = Auth::user();
        return view('user.edit', ['auth' => $auth]);
    }

    public function update(Request $request)
    {
      $user = Auth::user();

      // 現在のパスワード取得
      $currentPass = $user->password;
      $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:email|min:8',
        'password' => 'required'
        ]);

      // 入力されたパスワード取得
      $password = $request->input('password');

      if (Hash::check($password, $currentPass))
      {
        if ($request->input('newPass') === $request->input('confirmPass'))
        {
          $auth->password = Hash::make(request('newPass'));
          $auth->save();
          return redirect()->route('user.index', ['auth' => $auth]);
        }
      }

    }


}
