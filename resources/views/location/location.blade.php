@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col align-self-center">
                                Gestion des Locations
                            </div>
                            <div class="col text-right">
                                <a class="btn btn-sm btn-success" href="{{ route('select_location') }}">Louer un film</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            @if (session('info'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('info') }}
                                </div>
                            @endif

                            @if(count($locations) > 0)
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <td>Nom du film</td>
                                        <td>Date début location</td>
                                        <td>Date fin location</td>
                                        <td>Nom du loueur</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($locations as $location)
                                        <tr>
                                            <td>
                                                {{ $location->copie->film->titre }}
                                            </td>
                                            <td>
                                                {{date('d/m/Y',strtotime($location->date_debut_emprunt))}}
                                            </td>
                                            <td>
                                                {{date('d/m/Y', strtotime($location->date_fin_emprunt))}}
                                            </td>
                                            <td>
                                                {{$location->user->name}}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{ route('show_location', ['id' => $location->id]) }}">Voir</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                Aucune location.
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
