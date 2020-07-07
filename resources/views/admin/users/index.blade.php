@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Gestion des utilisateurs</div>

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

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Nom</td>
                                <td>Adresse email</td>
                                <td>Rôle</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @switch($user->role)
                                        @case("ROLE_ADMIN")
                                            Administrateur
                                            @break
                                        @case("ROLE_USER")
                                        @default
                                            Utilisateur
                                            @break
                                    @endswitch
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-warning" href="{{ route('admin_users_edit', ['id' => $user->id]) }}">Modifier</a>
                                    <a class="btn btn-sm btn-danger" href="{{ route('admin_users_delete', ['id' => $user->id]) }}">Supprimer</a>
                                </td>
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
