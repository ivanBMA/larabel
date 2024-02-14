<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;


class Cover extends Model
{
    use HasFactory;
    protected $fillable = ['alto', 'ancho', 'ruta_img', 'extension_img'];
    
    public function book(){
        return $this->belongsTo(Book::class);
    }
    
}
