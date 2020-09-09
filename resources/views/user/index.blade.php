@extends('layout')

@section('content')

    <h1 id="song-title">登録情報の編集</h1>
    <div>
      <p>Name: {{ $auth->name }}</p>
      <p>Email: {{ $auth->email }}</p>
    </div>
    <div>
      <a href={{ route('songs.list') }}>戻る</a>
      | <a href={{ route('user.edit') }}>編集</a>
    </div>

@endsection
