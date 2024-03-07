<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class HomeValidatorRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'output' => 'sometimes|nullable|in:pdf,excel'
        ];
    }

    public function failedValidation(Validator $validator) {
        throw new \Exception($validator->errors()->first(), 422);
    }
}
