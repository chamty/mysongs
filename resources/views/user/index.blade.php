@extends('layout')

@section('content')

    <h1 id="song-title">登録情報の編集</h1>
    <div class="profile-list">
      <div class="profile-group">
        <div class="profile-title">名前</div>
        <div class="profile-element">{{ $auth->name }}</div>
      </div>
      <div class="profile-group">
        <div class="profile-title">メールアドレス</div>
        <div class="profile-element">{{ $auth->email }}</div>
      </div>
    </div>
    <div>
      <a href={{ route('songs.list') }}>戻る</a>
      | <a href={{ route('user.edit') }}>編集</a>
    </div>

@endsection
