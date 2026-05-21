<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;

class HomeController extends Controller
{
    public function index()
    {
        $equipamentos = Equipamento::where('status', 'DISPONIVEL')->get();

        return view('home', compact('equipamentos'));
    }
}