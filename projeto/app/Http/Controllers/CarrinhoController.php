<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\ItensPedido;
use App\Models\Produto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CarrinhoController extends Controller
{
    
    public function add(Request $request){
        $user = Auth::user();
        $produtoId = $request->input('produto_id');
        $produto = Produto::findOrFail($produtoId);

        $pedido = Pedido::firstOrCreate([
            'user_id' => $user->id,
            'status' => 'aberto'
        ], ['total' => 0]);

        $item = ItensPedido::where('pedido_id', $pedido->id)
                            ->where('produto_id', $produtoId)
                            ->first();
        
        if ($item){
            $item->quantidade += 1;
            $item->save();
        } else {
            ItensPedido::create([
                'pedido_id' => $pedido->id,
                'produto_id' => $produtoId,
                'quantidade' => 1,
                'preco' => $produto->preco
            ]);
        }

        $pedido->total = ItensPedido::where('pedido_id', $pedido->id)
                        ->sum(DB::raw('quantidade * preco'));
        $pedido->save();

        return redirect('/dashboard-cli');

    }
    
    public function remove(Request $request){
        $user = Auth::user();
        $produtoId = $request->input('produto_id');

        $pedido = Pedido::where('user_id', $user->id)
                    ->where('status', 'aberto')
                    ->first();
        
        $item = ItensPedido::where('pedido_id', $pedido->id)
                ->where('produto_id', $produtoId);
        
        if($item){
            $item->delete();
            $pedido->total = ItensPedido::where('pedido_id', $pedido->id)
                            ->sum(DB::raw('quantidade * preco'));
            $pedido->save();
        }
        return redirect('/dashboard-cli');
    }

    public function fechar(Request $request){
        $id = $request->input('pedido_id');
        $pedido = Pedido::findOrFail($id);
        $pedido->status= 'CONCLUIDO';
        $pedido->save();
        return redirect('/dashboard-cli');
    }

}