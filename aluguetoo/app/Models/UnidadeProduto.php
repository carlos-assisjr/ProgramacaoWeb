<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class UnidadeProduto extends Model
{
    protected $table = 'unidade_produtos';

    public $incrementing = true;

    protected $fillable = [
        'produto_id',
        'numero_serie',
        'status',
    ];
    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }
}