<?php

namespace App\Http\Requests\Admin;

use App\Mail\AdminSendResetLink;
use App\Models\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Mail;

class PasswordResetLinkRequest extends FormRequest
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
            "email"=> ["required","email","exists:admins,email"],
        ];
    }
    public function resetPasswordLink(PasswordResetLinkRequest $request){
        // dd($request->all());
        $token = \Str::random(64);
        $admin = Admin::where('email', $request->email)->first();
        $admin->forgot_token = $token;
        $admin->save();
        // try {
        Mail::to($request->email)->send(new AdminSendResetLink($token, $request->email));
        // } catch (\Exception $e) {
        //     echo $e->getMessage();
        //     exit;
        // }
    }
}
