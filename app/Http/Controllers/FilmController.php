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
        $films = Film::paginate(5);
         return view('/film/film', ['films' => $films]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('film/new');
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
        return view('film/show', ['film' => $film ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('film/edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        $film->update($request->all());

        return view('film/edit')->withTask($film)->with('info', 'Le film a bien été modifié');;


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
        return back()->with('info', 'Le film a bien été supprimé dans la base de données.');



    }
}
