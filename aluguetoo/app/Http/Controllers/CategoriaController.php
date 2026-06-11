<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
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

        $categorias = Categoria::latest()->get();

        return view('categoria.index', compact('categorias'));
    }

    public function create()
    {
        $this->somenteAdm();

        return view('categoria.create');
    }

    public function store(Request $request)
    {
        $this->somenteAdm();

        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string'],
        ]);

        Categoria::create($request->only('nome', 'descricao'));

        return redirect('/categoria')->with('success', 'Categoria cadastrada com sucesso!');
    }

    public function show(Categoria $categorium)
    {
        $this->somenteAdm();

        $categoria = $categorium;

        return view('categoria.show', compact('categoria'));
    }

    public function edit(Categoria $categorium)
    {
        $this->somenteAdm();

        $categoria = $categorium;

        return view('categoria.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categorium)
    {
        $this->somenteAdm();

        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string'],
        ]);

        $categorium->update($request->only('nome', 'descricao'));

        return redirect('/categoria')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy(Categoria $categorium)
    {
        $this->somenteAdm();

        $categorium->delete();

        return redirect('/categoria')->with('success', 'Categoria excluída com sucesso!');
    }
}
