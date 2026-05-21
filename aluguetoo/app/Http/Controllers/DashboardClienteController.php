<?php

namespace App\Http\Controllers;

use App\Models\Aluguel;
use Illuminate\Support\Facades\Auth;

class DashboardClienteController extends Controller
{
    public function index()
    {
        $aluguel = Aluguel::where('user_id', Auth::id())
            ->where('status', 'RESERVADO')
            ->with('itens.equipamento')
            ->first();

        return view('dashboard-cli', compact('aluguel'));
    }
}