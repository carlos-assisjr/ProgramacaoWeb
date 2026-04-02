<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = "pedido";
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
        return $this->hasMany(ItemPedido::class, 'pedido_id');
    }
}