<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituto extends Model
{
    use HasFactory;
    protected $fillable = ['cod_instituto', 'nombre', 'localidad', 'numeroAlumnos'];
}
