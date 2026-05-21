<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamento;
use App\Models\Categoria;
use App\Models\Loja;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class EquipamentoController extends Controller
{
    public function index()
    {
        $equipamentos = Equipamento::with('categoria')->get();
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
        try {
            $data = $request->all();

            if ($request->hasFile('foto')) {
                $data['foto'] = $request->file('foto')->store('equipamentos', 'public');
            }

            Equipamento::create($data);

            return redirect()->route('equipamento.index')->with('success', 'Equipamento criado com sucesso!');
        } catch (Exception $e) {
            Log::error('Erro ao criar equipamento: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);

            return redirect()->route('equipamentos.index')->with('failure', 'Erro ao criar registro do equipamento!');
        }
    }

    public function show(string $id)
    {
        $equipamento = Equipamento::findOrFail($id);
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
        try {
            $equipamento = Equipamento::findOrFail($id);
            $data = $request->all();

            if ($request->hasFile('foto')) {
                if ($equipamento->foto) {
                    Storage::disk('public')->delete($equipamento->foto);
                }
                $data['foto'] = $request->file('foto')->store('equipamentos', 'public');
            }

            $equipamento->update($data);

            return redirect()->route('equipamento.index')->with('success', 'Equipamento atualizado com sucesso!');
        } catch (Exception $e) {
            Log::error('Erro ao atualizar equipamento: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);

            return redirect()->route('equipamentos.index')->with('failure', 'Erro ao atualizar registro do equipamento!');
        }
    }
    public function destroy(string $id)
    {
        try {
            $equipamento = Equipamento::findOrFail($id);

            if ($equipamento->foto) {
                Storage::disk('public')->delete($equipamento->foto);
            }

            $equipamento->delete();

            return redirect()->route('equipamento.index')->with('success', 'Equipamento excluído com sucesso!');
        } catch (Exception $e) {
            Log::error('Erro ao excluir equipamento: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'id' => $id
            ]);

            return redirect()->route('equipamentos.index')->with('failure', 'Erro ao excluir registro do equipamento!');
        }
    }
}