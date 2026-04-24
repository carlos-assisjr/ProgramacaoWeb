<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;

class DashboardClienteController extends Controller
{
    public function index(){
        $pedido = Pedido::where('user_id', Auth::id())
                    ->where('status', 'aberto')
                    ->with('itens.produto')
                    ->first();
        return view('dashboard-cli', compact('pedido'));
    }
}