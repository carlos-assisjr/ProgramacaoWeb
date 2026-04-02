<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemLocacao extends Model
{
    protected $table = "itens_locacao";
    public $incrementing = true;
    protected $fillable = [
        'locacao_id',
        'produto_id',
        'quantidade',
        'valor_diaria'
    ];

    protected $casts = [
        'quantidade' => 'integer',
        'valor_diaria' => 'decimal:2'
    ];

    public function locacao(){
        return $this->belongsTo(Locacao::class, 'locacao_id');
    }

    public function produto(){
        return $this->hasMany(Produto::class, 'produto_id');
    }
}