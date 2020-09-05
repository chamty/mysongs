<?php

namespace App\Http\Controllers;

use App\Songs;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SongsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth')->except(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_id = Auth::id();
        $songs = Songs::where('user_id', $user_id);
        return view('index', ['user_id' => $user_id, 'songs' => $songs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('new', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $song = new Songs();
      $user = \Auth::user();
      $song->song_name = request('song_name');
      $song->artist = request('artist');
      $song->category_id = request('category_id');
      $song->user_id = $user->id;
      $song->save();
      return redirect()->route('songs.detail', ['id' => $song->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $song = Songs::find($id);
        $user = \Auth::user();

        if ($user) {
          $login_user_id = $user->id;
        } else {
          $login_user_id = '';
        }

        return view('show', ['song' => $song, 'login_user_id' => $login_user_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function edit(Songs $songs, $id)
    {
        $song = Songs::find($id);
        $categories = Category::all()->pluck('name', 'id');
        return view('edit', ['song' => $song, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Songs $songs)
    {
      $song = Songs::find($id);
      $song->song_name = request('song_name');
      $song->artist = request('artist');
      $song->category_id = request('category_id');
      $song->save();
      return redirect()->route('songs.detail', ['id' => $song->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $song = Songs::find($id);
        $song->delete();
        return redirect('/songs');
    }
}
