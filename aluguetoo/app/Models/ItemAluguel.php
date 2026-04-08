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

    public function aluguel()
    {
        return $this->belongsTo(Aluguel::class, 'aluguel_id');
    }
}