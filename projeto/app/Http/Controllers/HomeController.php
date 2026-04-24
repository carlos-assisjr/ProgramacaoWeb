<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class HomeController extends Controller
{

    public function index(){
        $produtos = Produto::where('estoque', '>=', 1)->get();
        return view('home', compact('produtos'));
    }
    
}