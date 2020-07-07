<?php

namespace App\Http\Controllers;

use App\Film;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::withTrashed()->oldest('titre')->paginate(5);
         return view('admin/film/film', ['films' => $films]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin/film/new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date_sortie' => 'required|date',
        ]);

        $film = new Film();

        $film->titre = $request->titre;
        $film->genre = $request->genre;
        $film->date_sortie = Carbon::create($request->date_sortie);
        $film->description = $request->description;

        $film->save();

        return redirect('films');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $film = Film::find($id);
        return view('admin/film/show', ['film' => $film ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $film = Film::findOrFail($id);
        return view('admin/film/edit', ['film' => $film]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {

        $request->validate([
            'titre'=>['required', 'min:5', 'max:50'],
            'genre' => ['required', 'min:5', 'max:50'],
            'date_sortie' => ['required', 'date'],
            'description' => ['required'],
        ]);

        $film = Film::findorfail($id);
        $film->titre = $request->titre;
        $film->genre = $request->genre;
        $film->date_sortie = Carbon::create($request->date_sortie);
        $film->description = $request->description;

        $film->save();



        return redirect('films')->with('info', 'Le film a bien été modifié avec succès.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Film $film
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $film = Film::findorfail($id);

        $film->delete();
        return back()->with('info', 'Le film a bien été mis dans la corbeille.');

    }

    public function forceDestroy($id)
    {
        Film::withTrashed()->whereId($id)->firstOrFail()->forceDelete();
        return back()->with('info', 'Le film a bien été supprimé définitivement dans la base de données.');
    }


    public function restore($id)
    {
        Film::withTrashed()->whereId($id)->firstOrFail()->restore();
        return back()->with('info', 'Le film a bien été restauré.');
    }

}
