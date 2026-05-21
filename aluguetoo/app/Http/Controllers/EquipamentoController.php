<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Equipamento;
use App\Models\Loja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class EquipamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipamentos = Equipamento::with(['categoria', 'loja'])->get();
        return view('equipamento.index', compact('equipamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $lojas = Loja::all();
        return view('equipamento.create', compact('categorias', 'lojas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Equipamento::create($request->all());
        } catch (Exception $e) {
            Log::error('Erro ao inserir equipamento: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString()
            ]);
        }

        return redirect()->route('equipamentos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $equipamento = Equipamento::with(['categoria', 'loja'])->findOrFail($id);
        return view('equipamento.show', compact('equipamento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $equipamento = Equipamento::findOrFail($id);
        $categorias = Categoria::all();
        $lojas = Loja::all();
        return view('equipamento.edit', compact('equipamento', 'categorias', 'lojas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $equipamento = Equipamento::findOrFail($id);
            $equipamento->update($request->all());
        } catch (Exception $e) {
            Log::error('Erro ao alterar equipamento: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString()
            ]);
        }

        return redirect()->route('equipamentos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $equipamento = Equipamento::findOrFail($id);
            $equipamento->delete();
        } catch (Exception $e) {
            Log::error('Erro ao excluir equipamento: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString()
            ]);
        }

        return redirect()->route('equipamentos.index');
    }
}