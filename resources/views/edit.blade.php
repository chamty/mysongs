@extends('layout')

@section('content')

    <h1 id="song-title">{{ $song->song_name }} の編集</h1>
    {{ Form::model($song, ['route' => ['songs.update', $song->id]]) }}
      <div class='form-group'>
        {{ Form::label('song_name', '曲名：')}}
        {{ Form::text('song_name', null) }}
      </div>
      <div class='form-group'>
        {{ Form::label('artist', 'アーティスト名：')}}
        {{ Form::text('artist', null) }}
      </div>
      <div class='form-group'>
        {{ Form::label('category_id', '完成度：')}}
        {{ Form::select('category_id', $categories) }}
      </div>
      <div>
        {{ Form::submit('更新', ['class' => 'btn btn-primary button']) }}
      </div>
    {{ Form::close() }}
    <div>
      <a href={{ route('songs.list') }} >一覧に戻る</a>
    </div>

@endsection
