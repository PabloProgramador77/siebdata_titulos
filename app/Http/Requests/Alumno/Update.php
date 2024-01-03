<?php

namespace App\Http\Requests\Alumno;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
            
            'id' => 'required|integer',
            'nombre' => 'required|string|min:2',
            'primerApellido' => 'required|string|min:2',
            'segundoApellido' => 'string|min:2',
            'curp' => 'required|min:18|max:18',
            'email' => 'required|email|string',
            'idCarrera' => 'required|integer',
            'fechaInicio' => 'required|string',
            'fechaTermino' => 'required|string',

        ];
    }
}
