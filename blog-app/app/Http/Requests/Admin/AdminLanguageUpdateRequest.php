<?php

namespace App\Http\Requests\Admin;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AdminLanguageUpdateRequest extends FormRequest
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
        $langId = $this->route('language');
        return [
            'lang' => ['required', 'max:255', 'unique:languages,lang,' . $langId],
            'name' => ['required', 'max:255', 'unique:languages,name,' . $langId],
            'slug' => ['required', 'max:255', 'unique:languages,slug,' . $langId],
            'default' => ['required', 'boolean'],
            'status' => ['required', 'boolean'],
        ];
    }
    public function updateLang(Request $request, string $id)
    {
        $language = Language::findOrFail($id);
        $language->name = $request->name;
        $language->lang = $request->lang;
        $language->slug = $request->slug;
        $language->default = $request->default;
        $language->status = $request->status;
        $language->save();
    }
}
