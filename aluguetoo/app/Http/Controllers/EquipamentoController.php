<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Equipamento;
use App\Models\Loja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class EquipamentoController extends Controller
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

        $equipamentos = Equipamento::with('categoria', 'loja')
            ->latest()
            ->get();

        return view('equipamento.index', compact('equipamentos'));
    }

    public function create()
    {
        $this->somenteAdm();

        $categorias = Categoria::orderBy('nome')->get();
        $lojas = Loja::orderBy('nome')->get();

        return view('equipamento.create', compact('categorias', 'lojas'));
    }

    public function store(Request $request)
    {
        $this->somenteAdm();

        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'marca' => ['nullable', 'string', 'max:255'],
            'numero_serie' => ['nullable', 'string', 'max:50', 'unique:equipamentos,numero_serie'],
            'descricao' => ['nullable', 'string'],
            'categoria_id' => ['required', 'exists:categorias,id'],
            'loja_id' => ['required', 'exists:lojas,id'],
            'valor_diaria' => ['required', 'numeric', 'min:0'],
            'foto' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp'],
            'status' => ['required', 'in:DISPONIVEL,INDISPONIVEL,MANUTENCAO'],
        ]);

        $dados = $request->except('foto');

        if ($request->hasFile('foto')) {
            $dados['foto'] = $request->file('foto')->store('equipamentos', 'public');
        }

        Equipamento::create($dados);

        return redirect('/equipamento')->with('success', 'Equipamento cadastrado com sucesso!');
    }

    public function show(Equipamento $equipamento)
    {
        $this->somenteAdm();

        $equipamento->load('categoria', 'loja');

        return view('equipamento.show', compact('equipamento'));
    }

    public function edit(Equipamento $equipamento)
    {
        $this->somenteAdm();

        $categorias = Categoria::orderBy('nome')->get();
        $lojas = Loja::orderBy('nome')->get();

        return view('equipamento.edit', compact('equipamento', 'categorias', 'lojas'));
    }

    public function update(Request $request, Equipamento $equipamento)
    {
        $this->somenteAdm();

        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'marca' => ['nullable', 'string', 'max:255'],
            'numero_serie' => ['nullable', 'string', 'max:50', 'unique:equipamentos,numero_serie,' . $equipamento->id],
            'descricao' => ['nullable', 'string'],
            'categoria_id' => ['required', 'exists:categorias,id'],
            'loja_id' => ['required', 'exists:lojas,id'],
            'valor_diaria' => ['required', 'numeric', 'min:0'],
            'foto' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp'],
            'status' => ['required', 'in:DISPONIVEL,INDISPONIVEL,MANUTENCAO'],
        ]);

        $dados = $request->except('foto');

        if ($request->hasFile('foto')) {
            if ($equipamento->foto) {
                Storage::disk('public')->delete($equipamento->foto);
            }

            $dados['foto'] = $request->file('foto')->store('equipamentos', 'public');
        }

        $equipamento->update($dados);

        return redirect('/equipamento')->with('success', 'Equipamento atualizado com sucesso!');
    }

    public function destroy(Equipamento $equipamento)
    {
        $this->somenteAdm();

        if ($equipamento->foto) {
            Storage::disk('public')->delete($equipamento->foto);
        }

        $equipamento->delete();

        return redirect('/equipamento')->with('success', 'Equipamento excluído com sucesso!');
    }
}
