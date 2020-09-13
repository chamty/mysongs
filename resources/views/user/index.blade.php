@extends('layout')

@section('content')

    <h1 id="song-title">登録情報</h1>
    <div class="profile-list">
    <hr>
      <div class="profile-group">
        <div class="profile-title">名前</div>
        <div class="profile-element">{{ $user->name }}</div>
      </div>
      <div class="profile-group">
        <div class="profile-title">メールアドレス</div>
        <div class="profile-element">{{ $user->email }}</div>
      </div>
    <hr>
    </div>
    <div>
      <a href={{ route('songs.list') }}>戻る</a>
      | <a href={{ route('user.edit') }}>編集</a>
    </div>

@endsection
