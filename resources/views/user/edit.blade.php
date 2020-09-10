@extends('layout')

@section('content')

    <h1 id="song-title">登録情報の編集</h1>
    <form method="POST" action="{{ route('user.update') }}">
    {{ csrf_field() }}

      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      <div class="form-group">
        <label for="name">
          名前<span class="redstr">【必須】</span>
        </label>
        <div>
          <input type="text" name="name" class="form-control input-edit" value="{{ Auth::user()->name }}">
        </div>
      </div>
      <div class="form-group">
        <label for="email">
          メールアドレス<span class="redstr">【必須】</span>
        </label>
        <div>
          <input type="text" name="email" class="form-control input-edit" value="{{ Auth::user()->email }}">
        </div>
      </div>
      <!-- <div class="form-group">
        <label for="password">
          現在のパスワード<span class="redstr">【必須】</span>
        </label>
        <div>
          <input type="text" name="password" class="form-control input-edit" value="">
        </div>
      </div>
      <div class="form-group">
        <label for="newPass">
          新しいパスワード
        </label>
        <div>
          <input type="text" name="newPass" class="form-control input-edit" value="">
        </div>
      </div>
      <div class="form-group">
        <label for="newpass_confirmation">
          新しいパスワード（確認）
        </label>
        <div>
          <input type="text" name="newpass_confirmation" class="form-control input-edit">
        </div>
      </div> -->
        <button type="submit" class='btn btn-outline-primary button'>変更</button>
    </form>

@endsection