<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostLoginRequest;

class AdminAuthenticationController extends Controller
{
    // login view 
    public function login()
    {
        return view("admin.auth.login");
    }
    //post login request
    public function postLogin(PostLoginRequest $request)
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
}
