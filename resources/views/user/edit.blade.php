@extends('layout')

@section('content')

    <h1 id="song-title">登録情報の編集</h1>
    {{ Form::model($user, ['route' => ['user.update', $user->id]]) }}

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
        {{ Form::label('name', '名前：')}}
        {{ Form::text('name', $user->name) }}
      </div>
      <div class="form-group">
        {{ Form::label('email', 'メールアドレス：')}}
        {{ Form::text('email', $user->email) }}
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
      <div>
        {{ Form::submit('更新', ['class' => 'btn btn-primary button']) }}
      </div>
      {{ Form::close() }}
      <div>
        <a href={{ route('user.index') }}>キャンセル</a>
      </div>
    </form>

@endsection