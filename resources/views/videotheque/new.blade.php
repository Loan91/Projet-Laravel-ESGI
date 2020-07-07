@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Ajout d'un film à votre vidéothèque</div>

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
                        <form action="{{ route('videotheque_save') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Film à ajouter</label>
                                <div class="col-sm-10">
                                    <select class="custom-select" name="id">
                                        @foreach($films as $film)
                                            <option value="{{ $film->id }}">{{ $film->titre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 text-center mx-auto">
                                    <button type="submit" class="btn btn-success">Ajouter</button>
                                </div>
                            </div>
                        </form>
                    @else
                        Aucun film à rajouter.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
