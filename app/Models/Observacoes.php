<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observacoes extends Model
{
    use HasFactory;

    protected $fillable = ['observacao', 'tarefa_id'];
}