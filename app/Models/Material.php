<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', //meu bancoo,essas sao as entidades da minha tabela//
        'expiration',
        'user_id'
    ];
}
