<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
        protected $table = 'usuario';
        protected $fillable = ['id','nome', 'email','senha' ];

        public function review()
        {
            return $this->hasMany(
                review::class, //Modelo Relacionado
                'usuario_id', 
                'id' 
            );
        }

}
