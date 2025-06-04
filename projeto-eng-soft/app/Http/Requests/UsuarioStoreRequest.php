<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioStoreRequest extends FormRequest
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
    { // protected $fillable = ['id','nome', 'email','senha' ];
        return [
            'nome'=> 'required|string|max:255',
            'email'=> 'required|string|max:255',
            'senha'=> 'required|string|max:255',
        ];
    }
}
