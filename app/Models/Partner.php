<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Partner extends Model
{
    use HasFactory;
    protected $fillable = ['dni', 'nombre', 'apellido', 'edad', 'email'];

    public function books(){
        return $this->hasMany(Book::class)
            ->withPivot('fecha_reserva', 'fecha_devolucion')
            ->withTimestamps();
    }
}
