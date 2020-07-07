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
                                Aucun film n'est enregistré.
                            @else
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Titre du film</th>
                                    <th>Genre du film</th>
                                    <th>Date de sortie</th>
                                    <th colspan="3">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($films as $film)
                                    <tr @if($film->deleted_at) class="bg-secondary" @endif>
                                        <td>{{$film->titre}}</td>
                                        <td>{{$film->genre}}</td>
                                        <td>{{date('d/m/Y', strtotime($film->date_sortie))}}</td>
                                        <td @if($film->deleted_at)>


                                            <a class="btn btn-primary btn-sm" href="{{ route('restore_film', $film->id) }}">Restaurer</a>

                                        @else
                                            <td><a class="btn btn-primary btn-sm" href="{{ route('show_film', $film->id) }}">Voir</a></td>
                                            @endif

                                            </td>
                                        <td><a class="btn btn-warning btn-sm" href="{{ route('edit_film', $film->id) }}">Modifier</a></td>


                                        <td>


                                                <a class="btn btn-danger btn-sm" href="{{ route($film->deleted_at? 'force_delete_film' : 'delete_film', $film->id) }}">Supprimer</a>

                                        </td>

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
