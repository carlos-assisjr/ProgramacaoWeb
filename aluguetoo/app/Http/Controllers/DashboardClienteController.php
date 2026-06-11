<?php

namespace App\Http\Controllers;

use App\Models\Aluguel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardClienteController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'CLI') {
            abort(403);
        }

        $alugueis = Aluguel::where('user_id', Auth::id())
            ->with('itens.equipamento')
            ->latest()
            ->get();

        return view('dashboard.cli', compact('alugueis'));
    }
}
