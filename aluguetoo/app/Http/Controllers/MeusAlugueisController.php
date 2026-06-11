<?php

namespace App\Http\Controllers;

use App\Models\Aluguel;
use App\Models\ItemAluguel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MeusAlugueisController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'CLI') {
            abort(403);
        }

        $alugueis = Aluguel::where('user_id', Auth::id())
            ->whereIn('status', ['RETIRADO', 'DEVOLVIDO', 'ATRASADO'])
            ->with('itens.equipamento')
            ->latest()
            ->get();

        return view('aluguel.meus', compact('alugueis'));
    }

    public function devolverAntecipado($id)
    {
        if (Auth::user()->role !== 'CLI') {
            abort(403);
        }

        $item = ItemAluguel::with('aluguel', 'equipamento')->findOrFail($id);

        if ($item->aluguel->user_id !== Auth::id()) {
            abort(403);
        }

        if (!in_array($item->aluguel->status, ['RETIRADO', 'ATRASADO'])) {
            return redirect()->back()->with('error', 'Este aluguel não pode ser devolvido agora.');
        }

        if ($item->data_devolucao) {
            return redirect()->back()->with('error', 'Este equipamento já foi devolvido.');
        }

        $item->update([
            'data_devolucao' => Carbon::now(),
        ]);

        if ($item->equipamento) {
            $item->equipamento->update([
                'status' => 'DISPONIVEL',
            ]);
        }

        $aluguel = $item->aluguel;

        $itensPendentes = $aluguel->itens()
            ->whereNull('data_devolucao')
            ->count();

        if ($itensPendentes === 0) {
            $aluguel->update([
                'status' => 'DEVOLVIDO',
            ]);
        }

        return redirect()->back()->with('success', 'Equipamento devolvido com sucesso!');
    }
}