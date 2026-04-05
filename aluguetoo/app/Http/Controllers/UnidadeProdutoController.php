<?php 
namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
class UnidadeProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('unidade_produto.index', compact('produtos'));
    }
    public function create()
    {
        $produtos = Produto::all();
        return view('unidade_produto.create', compact('produtos'));
    }
    public function store(Request $request)
    {
        // Lógica para salvar a unidade do produto
        return redirect()->route('unidade_produto.index');
    }
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        return view('unidade_produto.edit', compact('produto'));
    }
    public function update(Request $request, $id)
    {
        // Lógica para atualizar a unidade do produto
        return redirect()->route('unidade_produto.index');
    }
    public function destroy($id)
    {
        // Lógica para deletar a unidade do produto
        return redirect()->route('unidade_produto.index');
    }

}

?>