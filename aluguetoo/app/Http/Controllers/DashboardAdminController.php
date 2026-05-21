<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use App\Models\User;
use App\Models\Aluguel;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    public function equipamentosAlugados()
    {
        $equipamentosAlugados = DB::table('itens_aluguel')
            ->join('equipamentos', 'itens_aluguel.equipamento_id', '=', 'equipamentos.id')
            ->join('alugueis', 'itens_aluguel.aluguel_id', '=', 'alugueis.id')
            ->select(
                'equipamentos.nome',
                DB::raw('COUNT(itens_aluguel.id) as quantidade_alugada')
            )
            ->groupBy('equipamentos.nome')
            ->orderByDesc('quantidade_alugada')
            ->get();

        $totalEquipamentos = Equipamento::count();
        $totalUsuarios = User::count();
        $totalAlugueis = Aluguel::count();
        $pendencias = Aluguel::where('status', 'RESERVADO')->count();

        return view('dashboard-adm', compact(
            'equipamentosAlugados',
            'totalEquipamentos',
            'totalUsuarios',
            'totalAlugueis',
            'pendencias'
        ));
    }
}