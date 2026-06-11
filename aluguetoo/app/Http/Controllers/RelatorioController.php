<?php

namespace App\Http\Controllers;

use App\Models\Aluguel;
use App\Models\Equipamento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RelatorioController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'ADM') {
            abort(403);
        }

        $totalClientes = User::where('role', 'CLI')->count();
        $totalEquipamentos = Equipamento::count();
        $totalAlugueis = Aluguel::count();

        return view('dashboard.adm', compact(
            'totalClientes',
            'totalEquipamentos',
            'totalAlugueis'
        ));
    }
}
