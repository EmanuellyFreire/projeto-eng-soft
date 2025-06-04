<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    //
    protected $table = 'livro';
    protected $fillable = ['id','titulo','sinopse','autor_id','genero_id'];

    public function review()
    {
        return $this->hasMany(
            review::class, //Modelo Relacionado
            'livro_id', 
            'id' 
        );
    }

    public function autor()
    {
        return $this->belongsTo(
            autor::class, //Modelo Relacionado
            'autor_id', 
            'id'
        );
    }

    public function genero()
    {
        return $this->belongsTo(
            genero::class, //Modelo Relacionado
            'genero_id', 
            'id'
        );
    }
}
