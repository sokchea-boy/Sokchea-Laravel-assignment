<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
Use Illuminate\Contracts\Validation\Validator;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return false;
        return true;
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(
    response()->json([
                'success' => false,
                'message'=> $validator->errors()
    ],412)
            );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'title' => 'required|string|min:2|max:125',
        'author' => 'required|string|min:2|max:250',
        'isbn' => 'required|string|min:2|max:225',
        'publicationYear' => 'required|integer',
        'genre' => 'required|string|min:2|max:225',
        'availableCopies' => 'required|integer',
];

    }
}
