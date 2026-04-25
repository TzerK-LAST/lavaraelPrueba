<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create() {
        return view('user.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/user')->with('success', 'Usuario creado exitosamente');
    }

    public function show($id) {
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

public function update(Request $request, $id) {
    $user = User::findOrFail($id);

    $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|min:8',
    ]);

    $data = [
        'name'  => $request->name,
        'email' => $request->email,
    ];

    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password);
    }

    $user->update($data);

    return redirect('/dashboard')->with('success', 'Usuario actualizado');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/user')->with('success', 'Usuario eliminado');
    }
}