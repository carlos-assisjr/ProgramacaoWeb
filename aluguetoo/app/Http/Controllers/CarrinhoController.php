<?php

namespace App\Http\Controllers;

use App\Models\Aluguel;
use App\Models\Equipamento;
use App\Models\ItemAluguel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CarrinhoController extends Controller
{
    private function somenteCliente()
    {
        if (Auth::user()->role !== 'CLI') {
            abort(403);
        }
    }

    public function index()
    {
        $this->somenteCliente();

        $aluguel = Aluguel::where('user_id', Auth::id())
            ->where('status', 'RESERVADO')
            ->with('itens.equipamento')
            ->first();

        return view('carrinho.index', compact('aluguel'));
    }

    public function adicionar(Request $request)
    {
        $this->somenteCliente();

        $request->validate([
            'equipamento_id' => ['required', 'exists:equipamentos,id'],
        ]);

        $equipamento = Equipamento::findOrFail($request->equipamento_id);

        if ($equipamento->status !== 'DISPONIVEL') {
            return back()->with('error', 'Este equipamento não está disponível.');
        }

        $aluguel = Aluguel::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'status' => 'RESERVADO',
            ]
        );

        $jaExiste = ItemAluguel::where('aluguel_id', $aluguel->id)
            ->where('equipamento_id', $equipamento->id)
            ->exists();

        if ($jaExiste) {
            return redirect('/carrinho')->with('error', 'Este equipamento já está no carrinho.');
        }

        ItemAluguel::create([
            'aluguel_id' => $aluguel->id,
            'equipamento_id' => $equipamento->id,
            'loja_retirada_id' => $equipamento->loja_id,
            'loja_devolucao_id' => $equipamento->loja_id,
            'data_inicio' => now(),
            'data_fim_prevista' => null,
            'valor_diaria_contratada' => $equipamento->valor_diaria,
        ]);

        $equipamento->update([
            'status' => 'INDISPONIVEL',
        ]);

        return redirect('/carrinho')->with('success', 'Equipamento adicionado ao carrinho!');
    }

    public function atualizarDatas(Request $request)
    {
        $this->somenteCliente();

        $request->validate([
            'datas' => ['required', 'array'],
            'datas.*' => ['required', 'date', 'after:today'],
        ]);

        $aluguel = Aluguel::where('user_id', Auth::id())
            ->where('status', 'RESERVADO')
            ->with('itens')
            ->firstOrFail();

        foreach ($request->datas as $itemId => $dataFim) {
            $item = $aluguel->itens->where('id', $itemId)->first();

            if ($item) {
                $item->update([
                    'data_fim_prevista' => $dataFim,
                ]);
            }
        }

        return redirect('/carrinho')->with('success', 'Datas atualizadas com sucesso!');
    }

    public function finalizar()
    {
        $this->somenteCliente();

        $aluguel = Aluguel::where('user_id', Auth::id())
            ->where('status', 'RESERVADO')
            ->with('itens')
            ->first();

        if (!$aluguel) {
            return redirect('/carrinho')->with('error', 'Nenhum carrinho encontrado.');
        }

        if ($aluguel->itens->count() === 0) {
            return redirect('/carrinho')->with('error', 'Seu carrinho está vazio.');
        }

        foreach ($aluguel->itens as $item) {
            if (!$item->data_fim_prevista) {
                return redirect('/carrinho')->with('error', 'Escolha a data final de todos os equipamentos antes de finalizar.');
            }
        }

        $aluguel->update([
            'status' => 'RETIRADO',
        ]);

        return redirect('/meus-alugueis')->with('success', 'Aluguel finalizado com sucesso!');
    }

    public function remover(ItemAluguel $item)
    {
        $this->somenteCliente();

        if ($item->aluguel->user_id !== Auth::id()) {
            abort(403);
        }

        if ($item->equipamento) {
            $item->equipamento->update([
                'status' => 'DISPONIVEL',
            ]);
        }

        $item->delete();

        return redirect('/carrinho')->with('success', 'Item removido do carrinho.');
    }
}