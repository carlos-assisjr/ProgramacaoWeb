<?php

namespace App\Http\Controllers;

use App\Models\Loja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LojaController extends Controller
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

        $lojas = Loja::latest()->get();

        return view('loja.index', compact('lojas'));
    }

    public function create()
    {
        $this->somenteAdm();

        return view('loja.create');
    }

    public function store(Request $request)
    {
        $this->somenteAdm();

        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'endereco' => ['required', 'string', 'max:255'],
            'cidade' => ['required', 'string', 'max:100'],
            'estado' => ['required', 'string', 'max:50'],
            'cep' => ['required', 'string', 'max:20'],
        ]);

        Loja::create($request->only('nome', 'endereco', 'cidade', 'estado', 'cep'));

        return redirect('/loja')->with('success', 'Loja cadastrada com sucesso!');
    }

    public function show(Loja $loja)
    {
        $this->somenteAdm();

        return view('loja.show', compact('loja'));
    }

    public function edit(Loja $loja)
    {
        $this->somenteAdm();

        return view('loja.edit', compact('loja'));
    }

    public function update(Request $request, Loja $loja)
    {
        $this->somenteAdm();

        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'endereco' => ['required', 'string', 'max:255'],
            'cidade' => ['required', 'string', 'max:100'],
            'estado' => ['required', 'string', 'max:50'],
            'cep' => ['required', 'string', 'max:20'],
        ]);

        $loja->update($request->only('nome', 'endereco', 'cidade', 'estado', 'cep'));

        return redirect('/loja')->with('success', 'Loja atualizada com sucesso!');
    }

    public function destroy(Loja $loja)
    {
        $this->somenteAdm();

        $loja->delete();

        return redirect('/loja')->with('success', 'Loja excluída com sucesso!');
    }
}
