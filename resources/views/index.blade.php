@extends('layout')

@section('content')

    <h1 id="song-title">My Songs</h1>

  <table class='table table-striped table-hover'>
    <tr>
      <th id="red" style="width:50%">曲名</th>
      <th style="width:37%">アーティスト</th>
      <th style="width:13%">完成度</th>
    </tr>
    @foreach ($songs as $song)
      <tr>
        <td>
          <a href={{ route('songs.detail', ['id' => $song->id]) }}>
            {{ $song->song_name }}
          </a>
        </td>
        <td>{{ $song->artist }}</td>
        <td>{{ $song->category->name }}</td>
      </tr>
    @endforeach
  </table>

  @auth
    <div>
      <a href={{ route('songs.new') }} class='btn btn-outline-primary button'>追加</a>
    </div>
    <div>
      <a href={{ route('user.index') }} class='btn btn-outline-primary button'>登録情報の確認</a>
    </div>
  @endauth

@endsection
