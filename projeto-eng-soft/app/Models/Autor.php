<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    //
    protected $table = 'autor';
    protected $fillable = ['id','nome','data_nascimento','biografia'];

    public function livro()
        {
            return $this->hasMany(
                livro::class, //Modelo Relacionado
                'autor_id', 
                'id' 
            );
        }
}
