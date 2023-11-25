<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostProfileUpdateRequest;
use App\Http\Requests\Admin\PostUpdatePasswordRequest;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::guard('admin')->user();
        return view('admin.profile.index', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(PostProfileUpdateRequest $request, string $id)
    {
        $request->updateProfileInfo($request, $id);
        toast(__('Profile Updated Successfully!'), 'success')->position('top-end')->width('400');
        return redirect()->back();
    }
    /**
     * Update the specified resource for password.
     */
    public function passwordUpdate(PostUpdatePasswordRequest $request, string $id)
    {
        // dd($request->all());exit;
        $request->updatePassword($request, $id);
        toast(__('Password Updated Successfully!'), 'success')->position('top-end')->width('400');
        return redirect()->back();
    }
}
