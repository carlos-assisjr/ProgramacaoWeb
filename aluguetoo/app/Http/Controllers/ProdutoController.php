<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::with('categoria')->get();
        return view('produto.index', compact('produtos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('produto.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        // 1. Pega todos os dados que vieram do formulário
        $dados = $request->all();

        // 2. Resolve o erro de chave estrangeira (User ID)
        // Se você estiver logado, ele pega seu ID. Se não, usa o ID 1 para teste.
        $dados['user_id'] = Auth::id() ?? 1; 

        // 3. Garante valores para os campos que não estão no formulário de criar
        $dados['status'] = $dados['status'] ?? 'ATIVO';
        $dados['valor_caucao'] = $dados['valor_caucao'] ?? 0;

        // 4. Salva no banco
        Produto::create($dados);

        return redirect('/produtos');
    }

    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::all();
        return view('produto.edit', compact('categorias', 'produto'));
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->update($request->all());
        return redirect('/produtos');
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return redirect('/produtos');
    }

    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return view("produto.show", compact('produto'));
    }
}