<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PasswordResetLinkRequest;
use App\Http\Requests\Admin\PostLogoutRequest;
use App\Http\Requests\Admin\PostResetPasswordRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostLoginRequest;
use Illuminate\View\View;

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
    public function logout(PostLogoutRequest $request)
    {
        $request->adminLogout($request);
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
        $request->resetPasswordLink($request);
        return redirect()->back()->with('success', __('Email has been sent.'));
    }
    //reset password view
    public function resetPassword($token)
    {
        // echo "m here";exit;
        return view('admin.auth.reset-password', compact('token'));
    }
    //reset password post
    public function postResetPassword(PostResetPasswordRequest $request)
    {
        $request->checkUserandUpdatePassword($request);
        return redirect()->route('admin.login')->with('success', __('Password reset successful!'));

    }

}
