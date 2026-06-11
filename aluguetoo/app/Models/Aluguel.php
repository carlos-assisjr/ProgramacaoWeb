<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluguel extends Model
{
    use HasFactory;

    protected $table = 'alugueis';

    protected $fillable = [
        'user_id',
        'status',
    ];

    public function itens()
    {
        return $this->hasMany(ItemAluguel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
