<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'modelo', 
        'ano',
        'cor',
        'placa',
        'preco',
        'user_id'
    ];
}