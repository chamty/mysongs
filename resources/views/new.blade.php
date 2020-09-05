@extends('layout')

@section('content')

    <h1>新しい曲</h1>
    {{ Form::open(['route' => 'songs.store']) }}
      <div class='form-group'>
        {{ Form::label('song_name', '曲名')}}
        {{ Form::text('song_name', null) }}
      </div>
      <div class='form-group'>
        {{ Form::label('artist', 'アーティスト名')}}
        {{ Form::text('artist', null) }}
      </div>
      <div class='form-group'>
        {{ Form::label('category_id', '歌える度')}}
        {{ Form::select('category_id', $categories) }}
      </div>
      <div>
        {{ Form::submit('作成する', ['class' => 'btn btn-primary']) }}
      </div>
    {{ Form::close() }}
    <div>
      <a href={{ route('songs.list') }} >一覧に戻る</a>
    </div>

@endsection
