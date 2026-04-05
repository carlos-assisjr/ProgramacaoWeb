<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

    public $incrementing = true;

    protected $fillable = [
        'nome',
        'descricao',
        'estoque',
        'categoria_id',
        'valor_diaria',
        'valor_caucao',
        'localizacao_cidade',
        'localizacao_bairro',
        'status',
        'user_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
