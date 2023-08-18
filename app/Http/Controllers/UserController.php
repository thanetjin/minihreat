<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::get();
        return view('user.index',[
            'user' => $user,
            'name' => User::first()->name,
            'events' => Event::get()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create',[
            'users' => User::get(),
            'name' => User::find(1)->name
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
    public function show(string $username)
    {
        return view('user.show',[
            'user' => $username,
            'name' => User::find(1)->name,
            'detail' => User::find(1)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $username)
    {
        return view('user.edit',[
            'user' => $username,
            'name' => User::find(1)->name
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

    public function showCertificate(string $username){
        return view('user.certificate',[
            'user' => $username,
            'name' => User::find(1)->name,
            'detail' => User::find(1)
        ]);
    }
    public function showCreateEvent(string $username){
        return view('user.showCreateEvent',[
            'user' => $username,
            'name' => User::find(1)->name
        ]);
    }
    public function show_detail_event()
    {
        
        return view('user.detail_event');
        
    }

}
