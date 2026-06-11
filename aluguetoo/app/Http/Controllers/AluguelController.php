<?php

namespace App\Http\Controllers;

use App\Models\Aluguel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AluguelController extends Controller
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

        $alugueis = Aluguel::with('user', 'itens.equipamento')
            ->latest()
            ->get();

        return view('aluguel.index', compact('alugueis'));
    }

    public function create()
    {
        $this->somenteAdm();

        return view('aluguel.create');
    }

    public function store(Request $request)
    {
        $this->somenteAdm();

        return redirect('/aluguel')->with('error', 'Crie aluguéis pelo carrinho.');
    }

    public function show(Aluguel $aluguel)
    {
        $this->somenteAdm();

        $aluguel->load('user', 'itens.equipamento');

        return view('aluguel.show', compact('aluguel'));
    }

    public function edit(Aluguel $aluguel)
    {
        $this->somenteAdm();

        return view('aluguel.edit', compact('aluguel'));
    }

    public function update(Request $request, Aluguel $aluguel)
    {
        $this->somenteAdm();

        $request->validate([
            'status' => ['required', 'in:RESERVADO,RETIRADO,DEVOLVIDO,ATRASADO'],
        ]);

        $aluguel->update([
            'status' => $request->status,
        ]);

        if ($request->status === 'DEVOLVIDO') {
            foreach ($aluguel->itens as $item) {
                if ($item->equipamento) {
                    $item->equipamento->update(['status' => 'DISPONIVEL']);
                }

                $item->update([
                    'data_devolucao' => now(),
                ]);
            }
        }

        return redirect('/aluguel')->with('success', 'Aluguel atualizado com sucesso!');
    }

    public function destroy(Aluguel $aluguel)
    {
        $this->somenteAdm();

        $aluguel->delete();

        return redirect('/aluguel')->with('success', 'Aluguel excluído com sucesso!');
    }
}
