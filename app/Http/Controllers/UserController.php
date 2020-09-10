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
      // if (!(Hash::check($request->get('currentPass'), Auth::user()->password)))
      // {
      //   return redirect()->back()->with('change_password_error', '現在のパスワードが間違っています。');
      // }

      $request->validate([
        'users.name' => 'required',
        'users.email' => 'required|email|unique:email|alpha_num',
        'users.password' => 'required',
        'users.newpass' => 'sometimes|min:8',
        'users.newpass_confirmation' => 'confirmed',
      ],
      [
        'users.name.required' => '名前は必須です。',
        'users.email.required' => 'メールアドレスは必須です。',
        'users.password.required' => '現在のパスワードは必須です。',
        'users.newpass_confirmation.confirmed' => '確認用パスワードが一致していません。',
      ]);

      $auth = Auth::user();
      $auth->name = request('name');
      $auth->email = request('email');
      $auth->password = Hash::make(request('newPass'));
      $auth->save();
      return redirect()->route('user.index', ['auth' => $auth]);


      // if (Hash::check($password, $currentPass))
      // {
      //   if ($request->input('newPass') === $request->input('confirmPass'))
      //   {
      //     $auth->password = Hash::make(request('newPass'));
      //     $auth->save();
      //     return redirect()->route('user.index', ['auth' => $auth]);
      //   }
      // }
  }
}
