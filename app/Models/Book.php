<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cover;
use App\Models\Partner;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Book extends Model
{
    use HasFactory;
    //private $table = 'libros';

    protected $fillable = ['titulo', 'autor', 'fechapub'];
    public $timestamps = false; //no recomendable utilizar con migraciones
    
    //Cuando recupere titulo ->minusculas
    //cuando guarde titulo -> mayusculas
    //numero_paginas -> numeroPaginas

    //Al recuperar el autor sacar: Sr/Sra <nombre autor>
    //Al recuperar el numero paginas : <numero paginas> paginas
    //Al insertar el genero: 

    public function autor(){
        return Attribute::make(
            get: fn(String $value) => strtolower($value),
            set: fn(String $value) => strtoupper($value)
        );
    }
    public function titulo(){
        return Attribute::make(
            get: fn(String $value) => strtolower($value),
            set: fn(String $value) => strtoupper($value)
        );
    }

    protected $casts =[
        "fechapub" => 'datetime:d/m/Y'
    ];

    public function cover(){
        return $this->hasOne(Cover::class);
    }

    public function copies(){
        return $this->hasMany(Copy::class);
    }

    public function partners(){
        return $this->hasMany(Partner::class)
            ->withPivot('fecha_reserva', 'fecha_devolucion')
            ->withTimestamps();
    }
}
