@extends('layout')

@section('content')

    <h1>My Songs</h1>

  <table class='table table-striped table-hover'>
    <tr>
      <th style="width:50%">曲名</th>
      <th style="width:40%">アーティスト名</th>
      <th style="width:10%">歌える度</th>
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
      <a href={{ route('songs.new') }} class='btn btn-outline-primary'>New Song</a>
    </div>
  @endauth

@endsection
