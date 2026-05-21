<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use App\Models\Categoria;
use App\Models\Loja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquipamentoController extends Controller
{
    public function index()
    {
        $equipamentos = Equipamento::with(['categoria', 'loja'])->get();
        return view('equipamento.index', compact('equipamentos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $lojas = Loja::all();

        return view('equipamento.create', compact('categorias', 'lojas'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('equipamentos', 'public');
        }

        Equipamento::create($data);

        return redirect()->route('equipamentos.index')
            ->with('success', 'Equipamento criado com sucesso!');
    }

    public function show(string $id)
    {
        $equipamento = Equipamento::with(['categoria', 'loja'])->findOrFail($id);
        return view('equipamento.show', compact('equipamento'));
    }

    public function edit(string $id)
    {
        $equipamento = Equipamento::findOrFail($id);
        $categorias = Categoria::all();
        $lojas = Loja::all();

        return view('equipamento.edit', compact('equipamento', 'categorias', 'lojas'));
    }

    public function update(Request $request, string $id)
    {
        $equipamento = Equipamento::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($equipamento->foto) {
                Storage::disk('public')->delete($equipamento->foto);
            }

            $data['foto'] = $request->file('foto')->store('equipamentos', 'public');
        }

        $equipamento->update($data);

        return redirect()->route('equipamentos.index')
            ->with('success', 'Equipamento atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $equipamento = Equipamento::findOrFail($id);

        if ($equipamento->foto) {
            Storage::disk('public')->delete($equipamento->foto);
        }

        $equipamento->delete();

        return redirect()->route('equipamentos.index')
            ->with('success', 'Equipamento excluído com sucesso!');
    }
}