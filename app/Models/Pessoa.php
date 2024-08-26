<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'dataNasc',
        'cpf',
        'formacao',
        'statusform',
        'genero',
        'nomeform',
        'dataEnt',
        'dataSai',
        'id_tel',
        'id_func',
        'id_end',
    ];
}

