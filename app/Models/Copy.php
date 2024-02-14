<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Copy extends Model
{
    use HasFactory;

    protected $fillable = ['numero_edicion', 'editorial', 'fecha_edicion'];
    public function book(){
        return $this->belongsTo(Book::class);
    }
}
