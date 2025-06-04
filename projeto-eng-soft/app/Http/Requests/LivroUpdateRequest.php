<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    { //protected $fillable = ['id','titulo','sinopse','autor_id','genero_id'];
        return [
            'titulo'=> 'sometimes|required|string|max:255',
            'sinopse'=>'sometimes|required|string|max:1024',
            'autor_id'=>'sometimes|required|exists:autor,id',
            'genero_id'=>'sometimes|required|exists:genero,id'
        ];
    }
}
