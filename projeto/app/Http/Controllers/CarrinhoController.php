<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class CarrinhoController extends Controller
{
    public function add($request){
        $user = Auth::user();
        $produtoId = $request->input('produto_id');
        $produto = Produto::findOrfall($produtoId);

        $pedido = Produto::firstOrCereate([
            'use_id'=> $user->id,
            'status'=>'aberto'
        ], ['total '=>0]);
    
    }
    

}