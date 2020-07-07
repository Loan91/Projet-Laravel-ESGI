<?php

namespace App\Http\Controllers;

use App\Copie;
use App\Film;
use App\Location;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $locations = Auth::user()->locations()->orderBy("date_debut_emprunt", "asc")->get();



        return view('location/location', ['locations' => $locations]);
    }

    public function show($id)
    {
        $location = Location::find($id);

        return view('location/show', ['location' => $location]);

    }

    public function select()
    {
        $films = Copie::select('film_id')->groupBy('film_id')->get();

        $filmsUser = Film::whereIn('id', $films)->orderBy('titre', 'asc')->get();


        return view('location/select', ['films' => $filmsUser]);
    }

    public function new($id)
    {

        $usersFilm = Copie::where('film_id', '=', $id)->get();

        $film = Film::find($id);



        return view('location/new', ['usersFilm' => $usersFilm, 'film' => $film]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:App\Copie,id'],
            'date_debut_emprunt' => ['required', 'date'],
            'date_fin_emprunt' => ['required', 'date'],
        ]);


        $location = new Location();

        $location->videotheque_id = $request->id;
        $location->emprunteur_id = Auth::user()->id;
        $location->date_debut_emprunt = $request->date_debut_emprunt;
        $location->date_fin_emprunt = $request->date_fin_emprunt;

        $location->save();


        return redirect('locations')->with('info', 'La location a bien été créée.');
    }


}
