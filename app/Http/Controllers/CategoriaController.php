<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categoria.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Categoria::create($request->all());
        } catch (Exception $e) {
            Log::error('Erro ao inserir categorias: '.$e->getMessage(), [
                'stack' => $e->getTraceAsString()
            ]);
        }
        return redirect()->route('categoria.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categoria = Categoria:: fidOrFaill($id);
        return view("categoria.show", compact($categoria));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $categoria =Categoria::findOrfall($id);
            $categoria->delete();
        } catch (Exception $e) {
            Log::error('Erro ao excluir categorias: '.$e->getMessage(), [
                'stack' => $e->getTraceAsString()
            ]);
        }
        return redirect()->route('categoria.index');
    }
}