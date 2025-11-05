<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory; 

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'laboratorio',
        'fecha_caducidad',
    ];
}
