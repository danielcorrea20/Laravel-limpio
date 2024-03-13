<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;
    protected $table = 'alumnos';
    protected $fillable = ['nombre', 'apellidos', 'DNI', 'fecha_nacimiento', 'numero_matricula', 'email'];
}
