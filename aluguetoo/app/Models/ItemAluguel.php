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
        'equipamento_id',
        'loja_retirada_id',
        'loja_devolucao_id',
        'data_inicio',
        'data_fim_prevista',
        'data_devolucao',
        'valor_diaria_contratada',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            if (!$item->valor_diaria_contratada) {
                $equipamento = Equipamento::find($item->equipamento_id);
                $item->valor_diaria_contratada = $equipamento->valor_diaria;
            }
        });
    }

    public function aluguel()
    {
        return $this->belongsTo(Aluguel::class, 'aluguel_id');
    }

    public function equipamento()
    {
        return $this->belongsTo(Equipamento::class, 'equipamento_id');
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