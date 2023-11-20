<?php

namespace App\Http\Requests\Admin;

use App\Models\Admin;
use Illuminate\Foundation\Http\FormRequest;

class PostResetPasswordRequest extends FormRequest
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
            'email' => ['required', 'email', 'exists:admins,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required']
        ];
    }
    /**
     * fuction to check user and update password
    */
    public function checkUserandUpdatePassword(PostResetPasswordRequest $request){
        $admin = Admin::where(['email' => $request->email, 'forgot_token' => $request->token])->first();
        // $request->email;
        // $request->token;
        // exit;
        if (!$admin) {
            // dd('invalid token');exit;
            return back()->with('error', 'Invalid token!');
        }
        // echo $request->password;exit;
        $admin->password = bcrypt($request->password);
        $admin->forgot_token = null;
        $admin->save();
        // echo 'redirecting';exit;
    }
    
}
