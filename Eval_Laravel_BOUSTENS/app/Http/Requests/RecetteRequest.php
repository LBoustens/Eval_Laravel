<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Validator;

class RecetteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return ['duree' => ['required'
            ,
            'numeric'],
            'titre' => ['required'
                , 'alpha'],
            'photo' => ['required'
                , 'alpha'],
            'ingredients' => ['required'
                , 'alpha'],];

    }

    // fonction appelée si la validation échoue
    public function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator)
    { throw new HttpResponseException(
        response()->json([ 'status' => 0,
            'message' => $validator->errors()]));
    }
}
