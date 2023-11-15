<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostLoginRequest;

class AdminAuthenticationController extends Controller
{
    public function login(){
        return view("admin.auth.login");
    }
    public function postLogin(PostLoginRequest $request){
        // dd($request->all());
        $request->authenticate();
        return redirect()->route('admin.dashboard');        
    }
}
