<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $table = 'equipamentos';

    public $incrementing = true;

    protected $fillable = [
        'nome',
        'marca',
        'numero_serie',
        'descricao',
        'loja_id',
        'valor_diaria',
        'foto',
        'categoria_id',
        'status'
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
    public function loja(){
        return $this->belongsTo(Loja::class, 'loja_id');
    }
}