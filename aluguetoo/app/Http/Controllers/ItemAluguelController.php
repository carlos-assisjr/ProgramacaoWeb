<?php

namespace App\Http\Controllers;

use App\Models\Aluguel;
use App\Models\Ferramenta;
use App\Models\ItemAluguel;
use App\Models\Loja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class ItemAluguelController extends Controller
{
    public function index()
    {
        $itensAluguel = ItemAluguel::with(['aluguel', 'ferramenta', 'lojaRetirada', 'lojaDevolucao'])->get();
        return view('item_aluguel.index', compact('itensAluguel'));
    }

    public function create()
    {
        $alugueis = Aluguel::all();
        $ferramentas = Ferramenta::all();
        $lojas = Loja::all();

        return view('item_aluguel.create', compact('alugueis', 'ferramentas', 'lojas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'aluguel_id' => 'required|exists:alugueis,id',
            'ferramenta_id' => 'required|exists:ferramentas,id',
            'loja_retirada_id' => 'required|exists:lojas,id',
            'loja_devolucao_id' => 'nullable|exists:lojas,id',
            'data_inicio' => 'required|date',
            'data_fim_prevista' => 'nullable|date',
            'data_devolucao' => 'nullable|date',
        ]);

        ItemAluguel::create($request->only([
            'aluguel_id',
            'ferramenta_id',
            'loja_retirada_id',
            'loja_devolucao_id',
            'data_inicio',
            'data_fim_prevista',
            'data_devolucao',
        ]));

        return redirect()->route('itens_aluguel.index');
    }

    public function show($id)
    {
        $item = ItemAluguel::with(['aluguel', 'ferramenta', 'lojaRetirada', 'lojaDevolucao'])->findOrFail($id);
        return view('item_aluguel.show', compact('item'));
    }

    public function edit($id)
    {
        $item = ItemAluguel::findOrFail($id);
        $alugueis = Aluguel::all();
        $ferramentas = Ferramenta::all();
        $lojas = Loja::all();

        return view('item_aluguel.edit', compact('item', 'alugueis', 'ferramentas', 'lojas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'aluguel_id' => 'required|exists:alugueis,id',
            'ferramenta_id' => 'required|exists:ferramentas,id',
            'loja_retirada_id' => 'required|exists:lojas,id',
            'loja_devolucao_id' => 'nullable|exists:lojas,id',
            'data_inicio' => 'required|date',
            'data_fim_prevista' => 'nullable|date',
            'data_devolucao' => 'nullable|date',
        ]);

        $item = ItemAluguel::findOrFail($id);

        $item->update($request->only([
            'aluguel_id',
            'ferramenta_id',
            'loja_retirada_id',
            'loja_devolucao_id',
            'data_inicio',
            'data_fim_prevista',
            'data_devolucao',
        ]));

        return redirect()->route('itens_aluguel.index');
    }

    public function destroy($id)
    {
        try {
            $item = ItemAluguel::findOrFail($id);
            $item->delete();
        } catch (Exception $e) {
            Log::error('Erro ao excluir item do aluguel: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString()
            ]);
        }

        return redirect()->route('itens_aluguel.index');
    }
}
