<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomeLog',
        'tipoLog',
        'nrEnd',
        'complEnd',
        'cep', 
        'obsEnd',
        'id_bai',
    ];
}
