<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{

    protected $dateFormat = 'd/m/Y';
    protected $fillable = ['titulo', 'tipo', 'prioridade', 'descricao'];
    use HasFactory;
}