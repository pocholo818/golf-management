<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class MemberRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required'], 
            'last_name' => ['required'], 
            'last_name' => ['required'], 
            'mobile_number' => ['required'], 
            'email' => ['required'],
            'password' => [
                Password::min(8)
                ->mixedCase()
                ->numbers()
                ->letters()  
        ],
        ];
    }
}
