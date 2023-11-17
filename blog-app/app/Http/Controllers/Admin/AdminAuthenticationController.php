<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PasswordResetLinkRequest;
use App\Mail\AdminSendResetLink;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostLoginRequest;
use Illuminate\View\View;
use Mail;

class AdminAuthenticationController extends Controller
{
    // login view 
    public function login(): View
    {
        return view("admin.auth.login");
    }
    //post login request
    public function postLogin(PostLoginRequest $request): RedirectResponse
    {
        // dd($request->all());
        $request->authenticate();
        return redirect()->route('admin.dashboard');
    }
    // post logout request
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
    // reset password view
    public function forgotPassword(): View
    {
        return view('admin.auth.forgot-password');
    }
    //post reset password link
    public function postForgotPassword(PasswordResetLinkRequest $request): RedirectResponse
    {
        // dd($request->all());
        $token = \Str::random(64);
        $admin = Admin::where('email', $request->email)->first();
        $admin->remember_token = $token;
        $admin->save();
        // try {
            Mail::to($request->email)->send(new AdminSendResetLink($token,$request->email));
        // } catch (\Exception $e) {
        //     echo $e->getMessage();
        //     exit;
        // }
        return redirect()->back()->with('success', 'Email has been sent.');
    }
    // get reset password
    public function resetPassword($token){
        // echo "m here";exit;
        return view('admin.auth.reset-password');
    }

}
