<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::first();
        return view('user.index',[
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create',[
            'users' => User::first(),
        ]);
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
    public function show()
    {
        return view('user.show',[
            'user' => User::first(),
            'detail' => User::first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('user.edit',[
            'user' => User::first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showCertificate(){
        return view('user.certificate',[
            'user' => User::first()
        ]);
    }
}
