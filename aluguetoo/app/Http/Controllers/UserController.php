<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    private function somenteAdm()
    {
        if (Auth::user()->role !== 'ADM') {
            abort(403);
        }
    }

    public function index()
    {
        $this->somenteAdm();

        $users = User::latest()->get();

        return view('user.index', compact('users'));
    }

    public function create()
    {
        $this->somenteAdm();

        return view('user.create');
    }

    public function store(Request $request)
    {
        $this->somenteAdm();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'cpf' => ['nullable', 'string', 'max:11', 'unique:users,cpf'],
            'telefone' => ['nullable', 'string', 'max:20'],
            'endereco' => ['nullable', 'string', 'max:255'],
            'password' => ['required', 'min:6'],
            'role' => ['required', 'in:ADM,CLI'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect('/user')->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function show(User $user)
    {
        $this->somenteAdm();

        return view('user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $this->somenteAdm();

        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->somenteAdm();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'cpf' => ['nullable', 'string', 'max:11', 'unique:users,cpf,' . $user->id],
            'telefone' => ['nullable', 'string', 'max:20'],
            'endereco' => ['nullable', 'string', 'max:255'],
            'role' => ['required', 'in:ADM,CLI'],
        ]);

        $user->update($request->only(
            'name',
            'email',
            'cpf',
            'telefone',
            'endereco',
            'role'
        ));

        return redirect('/user')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy(User $user)
    {
        $this->somenteAdm();

        if ($user->id === Auth::id()) {
            return redirect('/user')->with('error', 'Você não pode excluir sua própria conta.');
        }

        $user->delete();

        return redirect('/user')->with('success', 'Usuário excluído com sucesso!');
    }
}
