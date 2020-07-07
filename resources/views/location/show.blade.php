@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">

                        <div class="row ">
                            <div class="col"><strong>Détail de votre location</strong></div>
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

                            <p class="card-header-title"><strong>Titre du film : </strong>{{ $location->copie->film->titre }}</p>

        </header>
        <div class="card-content">
            <div class="content">
                <hr>
                <p><strong>Date début d'emprunt :</strong> {{ date('l j Y', strtotime($location->date_debut_emprunt)) }}</p>
                <p><strong>Date fin d'emprunt : </strong>{{ date('l j Y', strtotime($location->date_fin_emprunt)) }}</p>
                <p><strong>Adresse mail du loueur :</strong> <a href="mailto:{{$location->copie->user->email}}"> {{ $location->copie->user->email }}</a></p>
            </div>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
