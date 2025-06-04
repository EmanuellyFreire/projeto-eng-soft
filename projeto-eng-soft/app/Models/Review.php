<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $table = 'review';
    protected $fillable = ['id','nota', 'texto','usuario_id','livro_id'];

    public function usuario()
    {
        return $this->belongsTo(
            usuario::class, //Modelo Relacionado
            'usuario_id', 
            'id'
        );
    }

        public function livro()
    {
        return $this->belongsTo(
            livro::class, //Modelo Relacionado
            'livro_id', 
            'id'
        );
    }

}
