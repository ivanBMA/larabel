<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ConsultaMedica;

class Medico extends Model
{
    use HasFactory;
    public function medicos(){
        return $this->hasMany(ConsultaMedica::class);
    }
}
