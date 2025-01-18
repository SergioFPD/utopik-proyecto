<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class RegistrationRequest extends FormRequest
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
    {
        return [
                'user' => 'required|max:255|min:4',
                'password'  => 'required|max:255|min:4',
                'nombre'  => 'required|max:255|min:4',
                'email'  => 'required|max:255|min:10'
        ];
    }

    protected function failedValidation(Validator $validator)
    {

            $validator->errors()->add('register', 'register');


        // Llamamos a la excepción de validación para que Laravel maneje el error
        throw new ValidationException($validator);
    }
}
