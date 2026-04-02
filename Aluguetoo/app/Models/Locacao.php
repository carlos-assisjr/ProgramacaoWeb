<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locacao extends Model
{
    protected $table = "locacoes";
    public $increment = true;
    protected $fillable = [
        'user_id',
        'status',
        'total'
    ];

    protected $casts = [
        'total' => 'decimal:2',

    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function item(){
        return $this->hasMany(ItemLocacao::class, 'locacao_id');
    }
}