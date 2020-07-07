@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Gestion des films</div>

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
                        <form action="{{ route('update_film', $film->id) }}" method="post">

                            @csrf
                            <div class="mt-4">
                                <div class="form-group">

                                    <div class="col-sm-10">

                                        Titre du film : <input type="text" name="titre" id="titre" value="{{$film->titre}}" placeholder="Star wars" class="form-control" required>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-sm-10">

                                            Genre du film : <input type="text" name="genre" id="genre" value="{{$film->genre}}" placeholder="action" class="form-control" required>
                                        </div>

                                        <div class="form-group">

                                            <div class="col-sm-10">

                                                Date de sortie : <input type="date" name="date_sortie" id="genre" value="{{$film->date_sortie}}" class="form-control" required>
                                            </div>

                                            <div class="col-sm-10">

                                                Description du film : <textarea name="description" id="description" value="{{$film->description}}" placeholder="resumé du film..." rows="5" cols="33" class="form-control"></textarea>
                                            </div>

                                        </div>
                                        <br><div class="row">
                                            <div class="col text-center">
                                                <input type="submit" value="Mettre à jour le film !" class="btn btn-success mx-auto center-block">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
