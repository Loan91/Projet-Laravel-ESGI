@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">

                        <div class="row ">
                            <div class="col">Gestion des films</div>
                            <div class="col text-right">
                                <a href="{{ route('new_film') }}" class="btn btn-primary btn-sm">Ajouter un film</a>
                            </div>
                        </div>
                    </div>

                        @if(session()->has('info'))
                            <div class="alert alert-success">
                                {{ session('info') }}
                            </div>
                        @endif

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(count($films)== 0)
                                Aucun film n'est enregistrer
                            @else
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Titre du film</th>
                                    <th>Genre du film</th>
                                    <th>Date de sortie</th>
                                    <th colspan="3">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($films as $film)
                                    <tr>
                                        <td>{{$film->id}}</td>
                                        <td>{{$film->titre}}</td>
                                        <td>{{$film->genre}}</td>
                                        <td>{{date('d/m/Y', strtotime($film->date_sortie))}}</td>
                                        <td><a class="btn btn-primary btn-sm" href="{{ route('show_film', $film->id) }}">Voir</a></td>
                                        <td><a class="btn btn-warning btn-sm" href="{{ route('edit_film', $film->id) }}">Modifier</a></td>
                                        <td> <form action="{{ route('delete_film', $film->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                                            </form></td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>


                            <footer class="card-footer">
                                {{ $films->links() }}
                            </footer>
                            @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
