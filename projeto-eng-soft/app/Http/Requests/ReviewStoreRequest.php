<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewStoreRequest extends FormRequest
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
    { // protected $fillable = ['id','nota', 'texto','usuario_id','livro_id'];
        return [
           'nota'=>'required|numeric|min:0|max:5',
           'texto'=>'required|string|max:1024',
           'usuario_id'=>'required|exists:usuario,id',
           'livro_id'=>'required|exists:livro,id'
        ];
    }
}
