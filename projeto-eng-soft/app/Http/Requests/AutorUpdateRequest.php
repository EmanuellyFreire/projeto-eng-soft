<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorUpdateRequest extends FormRequest
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
    { //  protected $fillable = ['id','nome','dataNascimento','biografia'];
        return [
            'nome'=> 'sometimes|required|string|max:255',
            'dataNascimento'=>'sometimes|required|date',
            'biografia'=>'sometimes|required|string|max:1024',
        ];
    }
}
