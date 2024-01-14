<?php

namespace App\Http\Requests\Antecedente;

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
            'fechaInicio' => 'required|date',
            'fechaTermino' => 'required|date',
            'estudio' => 'required|integer',
            'entidad' => 'required|integer',
            'alumno' => 'required|integer',
            'cedula' => 'string|nullable',

        ];
    }
}
