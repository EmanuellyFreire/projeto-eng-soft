<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    //
    protected $table = 'genero';
    protected $fillable = ['id','nome'];

        public function livro()
        {
            return $this->hasMany(
                livro::class, //Modelo Relacionado
                'genero_id', 
                'id' 
            );
        }
}
