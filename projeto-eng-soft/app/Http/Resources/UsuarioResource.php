<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    { // protected $fillable = ['id','nome', 'email','senha' ];
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'email' => $this->email,
            'senha'=> $this->senha,
        ];
    }
}
