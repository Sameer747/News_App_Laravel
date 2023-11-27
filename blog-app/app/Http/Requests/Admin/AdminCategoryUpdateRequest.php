<?php

namespace App\Http\Requests\Admin;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AdminCategoryUpdateRequest extends FormRequest
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
        $categoryId = $this->route('category');
        return [
            'name' => ['required', 'max:255', 'unique:categories,name,' . $categoryId],
            'show_at_nav' => ['required', 'boolean'],
            'language' => ['required'],
            'status' => ['required', 'boolean'],
        ];
    }
    public function UpdateCategory(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = \Str::slug($request->name);
        $category->language = $request->language;
        $category->show_at_nav = $request->show_at_nav;
        $category->status = $request->status;
        $category->save();
    }
}
