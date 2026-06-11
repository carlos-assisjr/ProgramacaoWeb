<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    use HasFactory;

    protected $table = 'equipamentos';

    protected $fillable = [
        'nome',
        'marca',
        'numero_serie',
        'descricao',
        'categoria_id',
        'loja_id',
        'valor_diaria',
        'foto',
        'status',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function loja()
    {
        return $this->belongsTo(Loja::class);
    }

    public function itensAluguel()
    {
        return $this->hasMany(ItemAluguel::class);
    }
}
