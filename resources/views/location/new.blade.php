@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Location du film : <strong>{{$film->titre}}</strong></div>

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


                        <form action="{{ route('save_location') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Emprunter à</label>
                                <div class="col-sm-9">
                                    <select class="custom-select" name="id">
                                        @foreach($usersFilm as $user)
                                            <option value="{{ $user->id }}">{{ $user->user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date_debut_emprunt" class="col-sm-3 col-form-label">Date début d'emprunt</label>
                                <div class="col-sm-9">

                                    <input type="date" name="date_debut_emprunt" id="date_debut_emprunt" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date_fin_emprunt" class="col-sm-3 col-form-label">Date fin d'emprunt</label>
                                <div class="col-sm-9">

                                    <input type="date" name="date_fin_emprunt" id="date_fin_emprunt" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-8 text-center mx-auto">
                                    <button type="submit" class="btn btn-success">Ajouter</button>
                                </div>
                            </div>
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
