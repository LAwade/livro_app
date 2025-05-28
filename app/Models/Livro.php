<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;
    
    protected $table = 'livros';
    protected $fillable = ['titulo', 'data_publicacao', 'valor', 'assunto_id'];
    public function autores() {
        return $this->belongsToMany(Autor::class);
    }
    public function assunto() {
        return $this->belongsTo(Assunto::class);
    }
}
