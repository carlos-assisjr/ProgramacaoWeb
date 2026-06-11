<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;

class HomeController extends Controller
{
    public function index()
    {
        $equipamentos = Equipamento::where('status', 'DISPONIVEL')
            ->with('categoria', 'loja')
            ->get();

        return view('site.home', compact('equipamentos'));
    }
}
