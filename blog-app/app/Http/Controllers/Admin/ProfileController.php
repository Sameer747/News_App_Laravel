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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostProfileUpdateRequest $request, string $id)
    {
        $request->updateProfileInfo($request, $id);
        toast('Profile Update Successfull!','success','center-center')->width('400');
        return redirect()->back();
    }

    /**
     * Update the specified resource for password.
     */
    public function passwordUpdate(PostUpdatePasswordRequest $request, string $id)
    {
        // dd($request->all());exit;
        $request->updatePassword($request, $id);
        toast('Password Update Successfull!','success','center-center')->width('400');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
