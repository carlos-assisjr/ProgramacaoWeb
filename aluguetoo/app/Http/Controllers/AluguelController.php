<?php

namespace App\Http\Controllers;

use App\Models\Aluguel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class AluguelController extends Controller
{
    public function index()
    {
        $alugueis = Aluguel::with('user')->get();
        return view('aluguel.index', compact('alugueis'));
    }

    public function create()
    {
        $users = User::all();
        return view('aluguel.create', compact('users'));
    }

    public function store(Request $request)
    {
        try {
            Aluguel::create($request->all());
        } catch (Exception $e) {
            Log::error('Erro ao inserir aluguel: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString()
            ]);
        }

        return redirect()->route('alugueis.index');
    }

    public function show($id)
    {
        $aluguel = Aluguel::with('user')->findOrFail($id);
        return view('aluguel.show', compact('aluguel'));
    }

    public function edit($id)
    {
        $aluguel = Aluguel::findOrFail($id);
        $users = User::all();
        return view('aluguel.edit', compact('aluguel', 'users'));
    }

    public function update(Request $request, $id)
    {
        try {
            $aluguel = Aluguel::findOrFail($id);
            $aluguel->update($request->all());
        } catch (Exception $e) {
            Log::error('Erro ao atualizar aluguel: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString()
            ]);
        }

        return redirect()->route('alugueis.index');
    }

    public function destroy($id)
    {
        try {
            $aluguel = Aluguel::findOrFail($id);
            $aluguel->delete();
        } catch (Exception $e) {
            Log::error('Erro ao excluir aluguel: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString()
            ]);
        }

        return redirect()->route('alugueis.index');
    }
}