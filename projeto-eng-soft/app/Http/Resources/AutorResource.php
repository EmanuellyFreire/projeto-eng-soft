<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AutorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    { //    protected $fillable = ['id','nome','dataNascimento','biografia'];
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'dataNascimento' => $this->dataNascimento,
            'biografia'=> $this->biografia,
        ];
    }
}
