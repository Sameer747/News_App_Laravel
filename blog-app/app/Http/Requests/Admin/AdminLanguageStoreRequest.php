<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminLanguageStoreRequest extends FormRequest
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
            'lang' => ['required', 'max:255', 'unique:languages,lang'],
            'name' => ['required', 'max:255'],
            'slug' => ['required', 'max:255', 'unique:languages,lang'],
            'default' => ['required', 'boolean'],
            'status' => ['required', 'boolean'],
        ];
    }
}
