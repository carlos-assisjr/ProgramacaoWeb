<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioController extends Controller
{
    public function gerarRelatorio()
    {
        $dados = Equipamento::with(['categoria', 'loja'])->get();

        $pdf = Pdf::loadView('relatorios.relatorio', compact('dados'));

        return $pdf->download('relatorio_equipamentos.pdf');
    }
}