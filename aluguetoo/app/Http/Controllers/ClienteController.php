<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'ADM') {
            abort(403);
        }

        $clientes = User::where('role', 'CLI')->latest()->get();

        return view('user.index', ['users' => $clientes]);
    }
}
