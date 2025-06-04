<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\AutorResource;
use App\Http\Resources\GeneroResource;

class UsuarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    { //   protected $fillable = ['id','titulo','sinopse','autor_id','genero_id'];
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'sinopse' => $this->sinopse,
            'autor_id' => new AutorResource($this->whenLoaded('autor_id')),
            'genero_id' => new GeneroResource($this->whenLoaded('genero_id'))
        ];
    }
}
