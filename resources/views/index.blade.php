@extends('layout')

@section('content')

  <h1 id="song-title">My Songs</h1>

  <ul class="nav nav-tabs">
    <li class="active"><a href="#repertoire" data-toggle="tab">レパートリー</a></li>
    <li><a href="#practice" data-toggle="tab">練習中</a></li>
    <li><a href="#wantprac" data-toggle="tab">練習したい</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="repertoire">
      <table class='table table-striped table-hover'>
        <tr>
          <th id="red" style="width:50%">曲名タブ1</th>
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
    </div>
    <div class="tab-pane" id="practice">
      <table class='table table-striped table-hover'>
        <tr>
          <th id="red" style="width:50%">曲名タブ2</th>
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
    </div>
    <div class="tab-pane" id="wantprac">
      <table class='table table-striped table-hover'>
        <tr>
          <th id="red" style="width:50%">曲名タブ3</th>
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
    </div>
  </div>

  @auth
    <div>
      <a href={{ route('songs.new') }} class='btn btn-outline-primary button'>追加</a>
    </div>
  @endauth

@endsection
