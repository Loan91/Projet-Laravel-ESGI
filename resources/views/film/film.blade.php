@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">

                        <div class="row ">
                            <div class="col">Gestion des films</div>
                            <div class="col text-right">
                                <a href="{{ route('new_film') }}" class="btn btn-primary btn-sm">Ajouter un film</a>
                            </div>
                        </div>
                    </div>

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
                                    <tr>
                                        <td>{{$film->titre}}</td>
                                        <td>{{$film->genre}}</td>
                                        <td>{{date('d/m/Y', strtotime($film->date_sortie))}}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
