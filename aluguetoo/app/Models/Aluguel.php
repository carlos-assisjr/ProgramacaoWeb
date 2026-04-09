<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluguel extends Model
{
    use HasFactory;

    protected $table = 'alugueis';
    public $incrementing = true;

    protected $fillable = [
        'cliente_id',
        'status'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
    public function itensAluguel()
    {
        return $this->hasMany(ItemAluguel::class, 'aluguel_id');
    }
}
