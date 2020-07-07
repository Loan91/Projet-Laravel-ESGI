@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">

                        <div class="row ">
                            <div class="col"><strong>Gestion des films</strong></div>
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

                            <p class="card-header-title"><strong>Titre : </strong>{{ $film->titre }}</p>

        </header>
        <div class="card-content">
            <div class="content">
                <p><strong>Année de sortie :</strong> {{ date('l j Y', strtotime($film->date_sortie)) }}</p>
                <hr>
                <h4><strong>Description du Film : </strong></h4>
                <p>{{ $film->description }}</p>
            </div>
        </div>
                            <a class="btn btn-primary btn-lg" href="{{ route('film', $film->id) }}">Retour vers tous les films</a>
    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
