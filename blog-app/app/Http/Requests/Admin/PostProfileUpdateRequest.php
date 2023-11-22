<?php

namespace App\Http\Requests\Admin;

use App\Models\Admin;
use App\Traits\FileUploadTrait;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PostProfileUpdateRequest extends FormRequest
{
    use FileUploadTrait;
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
            'image' => ['nullable', 'image', 'max:3000'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:admins,email,' . Auth::guard('admin')->user()->id]
        ];
    }
    public function updateProfileInfo(Request $request, string $id)
    {
        // handle image
        $imagePath = $this->handleFileUpload($request, 'image', $request->old_image);
        //update and save info
        $admin = Admin::findOrFail($id);
        $admin->image = !empty($imagePath) ? $imagePath : $request->old_image;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();
    }
}
