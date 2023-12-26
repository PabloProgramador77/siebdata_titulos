<?php

namespace App\Http\Requests\Carrera;

use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if( auth()->user()->id ){

            return true;

        }else{

            return false;

        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            
            'nombre' => 'required|string|min:2',
            'rvoe' => 'required|string|min:6',
            'clave' => 'required|string|min:6',
            'autoridad' => 'required|integer',
            
        ];
    }
}
