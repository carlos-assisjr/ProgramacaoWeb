<?php

namespace App\Models;

// Este model fica apenas para compatibilidade.
// No modelo simplificado, cliente é um User com role = CLI.

class Cliente extends User
{
    protected $table = 'users';

    protected static function booted()
    {
        static::addGlobalScope('clientes', function ($query) {
            $query->where('role', 'CLI');
        });
    }
}
