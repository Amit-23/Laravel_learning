<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Uppercase;

class UserRequest extends FormRequest
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

            'username' => ['required', new Uppercase],

            'useremail' => 'required|email',
            'userage' => 'required|numeric|  min:18',
            'usercity' => 'required',

            //
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '*Username cannot be empty!',
            'useremail.required' => '*Email Field cannot be empty!',
            'userage.required' => '*Age Field cannot be empty!',
            'userage.min' => '*You must be atleast 18 years old',
            'userage.numeric' => '*Age Field must contain numeric value only',


        ];
    }

    protected function prepareForValidation(): void
    {
        //$this->merge([
        // 'username' => strtoupper//($this->username),
        // ]);  used to sanitize the input
    }
}
