<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemAluguel extends Model
{
    use HasFactory;

    protected $table = 'itens_aluguel';

    protected $fillable = [
        'aluguel_id',
        'ferramenta_id',
        'valor_diaria_contratada',
        'loja_retirada_id',
        'loja_devolucao_id',
        'data_inicio',
        'data_fim_prevista',
        'data_devolucao',
    ];
    protected static function boot()
{
    parent::boot();

    static::creating(function ($item) {
        if (!$item->valor_diaria_contratada) {
            $ferramenta = \App\Models\Ferramenta::find($item->ferramenta_id);
            $item->valor_diaria_contratada = $ferramenta->valor_diaria;
        }
    });
}

        public function aluguel()
    {
        return $this->belongsTo(Aluguel::class, 'aluguel_id');
    }

    public function ferramenta()
    {
        return $this->belongsTo(Ferramenta::class, 'ferramenta_id');
    }

    public function lojaRetirada()
    {
        return $this->belongsTo(Loja::class, 'loja_retirada_id');
    }

    public function lojaDevolucao()
    {
        return $this->belongsTo(Loja::class, 'loja_devolucao_id');
    }
}