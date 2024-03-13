<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coche extends Model
{
    use HasFactory;
    /**
     * No es necesario crear el metodo all()
     */
    protected $table = 'coches';
    protected $fillable = ['marca', 'modelo', 'fecha_matriculacion', 'user_id'];
}
