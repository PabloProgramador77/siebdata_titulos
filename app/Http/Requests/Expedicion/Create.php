<?php

namespace App\Http\Requests\Expedicion;

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
            
            'alumno' => 'required|integer',
            'servicio' => 'required|integer',
            'fundamento' => 'required|integer',
            'titulacion' => 'required|integer',
            'entidad' => 'required|integer',
            'fechaExamen' => 'nullable|date',
            'fechaExencion' => 'nullable|date',

        ];
    }
}
