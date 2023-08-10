<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function confirm(){
        return view('admin.confirm');
    }

    public function reject(){
        return view('admin.reject');
    }

    public function store(Request $request)
    {
	
        $admin = User::where('role','admin')->first();

        if($request->hasFile('image_path')){
            $path = $request->file('image_path')->store('admin_images', 'public');
            $admin->image = $path;
        }

        $admin->save();
        return redirect()->back();
    }
}
