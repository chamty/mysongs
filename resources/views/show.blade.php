@extends('layout')

@section('content')

    <h1>{{ $song->song_name }}</h1>
    <div>
      <p>
        {{ $song->artist }},
        {{ $song->category->name }}
      </p>
    </div>
    <div>
      <a href={{ route('songs.list') }} >一覧に戻る</a>
      @auth
        @if ($shop->user_id === $login_user_id)
          | <a href={{ route('songs.edit', ['id' => $song->id]) }}>編集</a>
          <p></p>
          {{ Form::open(['method' => 'delete', 'route' => ['songs.destroy', $song->id]]) }}
            {{ Form::submit('削除', ['class' => 'btn btn-outline-danger']) }}
          {{ Form::close() }}
        @endif
      @endauth
    </div>

@endsection
