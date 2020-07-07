@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col align-self-center">
                            Gestion de votre vidéothèque
                        </div>
                        <div class="col text-right">
                            <a class="btn btn-sm btn-success" href="{{ route('videotheque_new') }}">Ajouter un film</a>
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

                    @if(count($videotheque) > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>Nom du film</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($videotheque as $item)
                                    <tr>
                                        <td>
                                            {{ $item->titre }}
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-danger" href="{{ route('videotheque_delete', ['id' => $item->id]) }}">Supprimer</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        Aucun film présent dans votre vidéothèque.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
