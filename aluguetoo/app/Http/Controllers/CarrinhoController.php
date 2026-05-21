<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluguel;
use App\Models\ItemAluguel;
use App\Models\Equipamento;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{
    public function add(Request $request)
    {
        $user = Auth::user();

    $equipamentoId = $request->input('equipamento_id');

    $equipamento = Equipamento::findOrFail($equipamentoId);

    if ($equipamento->status !== 'DISPONIVEL') {
        return back();
    }

    $aluguel = Aluguel::firstOrCreate([
        'user_id' => $user->id,
        'status' => 'RESERVADO',
    ]);

        ItemAluguel::create([
            'aluguel_id' => $aluguel->id,
            'equipamento_id' => $equipamento->id,
            'loja_retirada_id' => $equipamento->loja_id,
            'loja_devolucao_id' => $equipamento->loja_id,
            'data_inicio' => now(),
            'data_fim_prevista' => now()->addDays(1),
            'valor_diaria_contratada' => $equipamento->valor_diaria,
        ]);

        $equipamento->status = 'INDISPONIVEL';
        $equipamento->save();

        return redirect('/dashboard-cli');
    }

    public function remove(Request $request)
    {
        $itemId = $request->input('item_id');

        $item = ItemAluguel::findOrFail($itemId);

        $equipamento = Equipamento::find($item->equipamento_id);

        if ($equipamento) {
            $equipamento->status = 'DISPONIVEL';
            $equipamento->save();
        }

        $item->delete();

        return redirect('/dashboard-cli');
    }

    public function fechar(Request $request)
    {
        $aluguelId = $request->input('aluguel_id');

        $aluguel = Aluguel::findOrFail($aluguelId);
        $aluguel->status = 'RETIRADO';
        $aluguel->save();

        return redirect('/dashboard-cli');
    }
}
