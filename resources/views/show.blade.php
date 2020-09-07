@extends('layout')

@section('content')

    <h1 id="song-title">{{ $song->song_name }}</h1>
    <div id="song-detail">
      <p>アーティスト：{{ $song->artist }}</p>
      <p>完成度：{{ $song->category->name }}</p>
    </div>
    <div>
      <a href={{ route('songs.list') }} >一覧に戻る</a>
      @auth
        @if ($song->user_id === $login_user_id)
          | <a href={{ route('songs.edit', ['id' => $song->id]) }}>編集</a>
          <p></p>
          {{ Form::open(['method' => 'delete', 'route' => ['songs.destroy', $song->id]]) }}
            {{ Form::submit('削除', ['class' => 'btn btn-outline-danger button']) }}
          {{ Form::close() }}
        @endif
      @endauth
    </div>

@endsection
