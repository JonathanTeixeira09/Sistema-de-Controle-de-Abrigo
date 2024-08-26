<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abrigado extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'id',
        'nome_mae', 
        'nome_pai',
        'nome_resp', 
        'dataEnt',
        'dataSai',
        'genero',
        'cpf', 
        'dataNasc',
        'obs',
        'idLoc',
        'id_tel',
    ];
}
