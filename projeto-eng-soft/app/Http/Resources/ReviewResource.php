<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UsuarioResource;
use App\Http\Resources\LivroResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    { //protected $fillable = ['id','nota', 'texto','usuario_id','livro_id'];
        return [
            'id' => $this->id,
            'nota' => $this->nota,
            'texto' => $this->texto,
            'usuario' => $this->usuario->nome ?? null,
            'livro' => new LivroResource($this->whenLoaded('livro'))
        ];
    }
}
