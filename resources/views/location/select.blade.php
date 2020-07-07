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

                            @if(count($films) > 0)
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <td>Nom du film</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($films as $film)
                                        <tr>
                                            <td>
                                                {{ $film->titre }}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{ route('new_location', ['id' => $film->id]) }}">Sélectionner</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                Aucun film posséder par un utilisateur.
                            @endif
                </div>
            </div>
        </div>
    </div>
@endsection
