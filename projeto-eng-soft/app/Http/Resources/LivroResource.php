<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\AutorResource;
use App\Http\Resources\GeneroResource;
use App\Http\Resources\ReviewResource;

class LivroResource extends JsonResource
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
            'genero' => $this->genero->nome ?? null,
            'autor' => $this->autor->nome ?? null,
            'reviews' => ReviewResource::collection($this->whenLoaded('reviews')),
            
        ];
    }
}
