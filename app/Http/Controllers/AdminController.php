<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin/users/index', ['users' => $users]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin/users/edit', ['user' => $user]);
    }

    public function save($id, Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', Rule::unique('users')->ignore($id)],
            'role' => ['required', Rule::in(['ROLE_ADMIN', 'ROLE_USER'])],
            ]);

        $user = User::findOrFail($id);
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->role  = $request->role;
        $user->save();

        return redirect('admin/users')->with('info', 'L\'utilisateur a bien été modifié avec succès.');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        User::destroy($user->id);
        return redirect('admin/users')->with('info', 'L\'utilisateur a bien été supprimé.');
    }
}
