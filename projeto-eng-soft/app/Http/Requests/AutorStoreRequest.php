<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorStoreRequest extends FormRequest
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
           'nome'=> 'required|string|max:255',
           'dataNascimento'=>'required|date',
           'biografia'=>'required|string|max:1024',
        ];
    }
}
