<?php

namespace App\Http\Requests\Responsable;

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
            'nombre' => 'required|min:2|string',
            'primerApellido' => 'required|min:2|string',
            'segundoApellido' => 'required|min:2|string',
            'curp' => 'required|min:18|max:18',
            'cargo' => 'required|integer'
            
        ];
    }
}
