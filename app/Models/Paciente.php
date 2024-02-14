<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ConsultaMedica;

class Paciente extends Model
{
    use HasFactory;
    public function consultaMedica(){
        return $this->hasMany(ConsultaMedica::class);
    }
}
