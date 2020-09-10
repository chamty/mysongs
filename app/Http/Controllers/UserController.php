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
      // 入力エラーチェック
      // $request->validate([
      //   'users.name' => 'required|max:255',
      //   'users.email' => 'required|email|unique:email|alpha_num',
      //   // 'users.password' => 'required',
      //   // 'newpass' => 'nullable|min:8|max:255',
      //   // 'newpass_confirmation' => 'confirmed',
      // ],
      // [
      //   'users.name.required' => '名前の入力は必須です。',
      //   'users.name.max' => '名前は:max文字以内で設定してください。',
      //   'users.email.required' => 'メールアドレスの入力は必須です。',
      //   'users.email.unique' => '入力されたメールアドレスは既に使用されています。',
      //   'users.email.alpha_num' => 'メールアドレスは英数字で入力してください。',
      //   // 'users.password.required' => '現在のパスワードは必須です。',
      //   // 'newpass.min' => 'パスワードは:min文字以上で設定してください。',
      //   // 'newpass.max' => 'パスワードは:max文字以内で設定してください。',
      //   // 'newpass_confirmation.confirmed' => '確認用パスワードが一致していません。',
      // ]);

      // 現在のパスワードが合っていたら処理
      $auth = Auth::user();
      // $currentPass = $auth->password;
      // $password = request('password');
      // if (Hash::check($password, $currentPass))
      // {
        $auth->name = request('name');
        $auth->email = request('email');
        // $auth->password = Hash::make($password);
        $auth->save();
        return redirect()->route('user.index', ['auth' => $auth]);
      // } else {
      //   return Response::make('現在のパスワードが間違っています。');
      // }
  }
}
