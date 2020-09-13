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
      $user = Auth::user();
      return view('user.index', ['user' => $user]);
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
      $user = Auth::user();
      // 入力エラーチェック
      if ($request ->name !== $user->name) {
        $valiated = $request->validate([
          'name' => 'required|max:255',
        ],
        [
          'name.required' => '名前の入力は必須です。',
        ]);
      }
      if ($request->email !== $user->email) {
        $valiated = $request->validate([
          'email' => 'required|email|unique:users,email',
        ],
        [
          'email.required' => 'メールアドレスの入力は必須です。'
        ]);
      }

      // $valiated = $request->validate([
      //   'name' => 'required|max:255',
      //   'email' => 'required|email|unique:users,email',
      //   'users.password' => 'required',
      //   'newpass' => 'nullable|min:8|max:255',
      //   'newpass_confirmation' => 'confirmed',
      // ],
      // [
      //   'name.required' => '名前の入力は必須です。',
      //   'email.required' => 'メールアドレスの入力は必須です。',
      //   'users.password.required' => '現在のパスワードは必須です。',
      //   'newpass.min' => 'パスワードは:min文字以上で設定してください。',
      //   'newpass.max' => 'パスワードは:max文字以内で設定してください。',
      //   'newpass_confirmation.confirmed' => '確認用パスワードが一致していません。',
      // ]);

      // 現在のパスワードが合っていたら処理
      // $currentPass = $auth->password;
      // $password = request('password');
      // if (Hash::check($password, $currentPass))
      // {
        $user->name = request('name');
        $user->email = request('email');
        // $auth->password = Hash::make($password);
        $user->save();
        return redirect()->route('user.index', ['user' => $user]);
      // } else {
      //   return Response::make('現在のパスワードが間違っています。');
      // }
  }
}
