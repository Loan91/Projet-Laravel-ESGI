<?php

namespace App\Http\Controllers;

use App\Film;
use App\UserFilm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideothequeController extends Controller
{
    public function index()
    {
        $videotheque = Auth::user()->films()->orderBy('titre','asc')->get();
        return view('videotheque/index', ['videotheque' => $videotheque]);
    }

    public function new()
    {
        $filmsUser = Auth::user()->films()->select('film_id')->get();
        $films = Film::whereNotIn('id', $filmsUser)->orderBy('titre', 'asc')->get();
        return view('videotheque/new', ['films' => $films]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:App\Film,id'],
        ]);

        $user = Auth::user();
        $film = Film::find($request->id);
        $user->films()->attach($film);

        return redirect('videotheque')->with('info', 'Le film a bien été ajouté à votre vidéothèque.');
    }

    public function delete($id)
    {
        $user = Auth::user();
        $film = Film::find($id);
        $user->films()->detach($film);
        return redirect('videotheque')->with('info', 'Le film a bien été supprimé de votre vidéothèque.');
    }
}
