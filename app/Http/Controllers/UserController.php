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
        $user = User::find(2);
        return view('user.index',[
            'user' => $user,
            'name' => User::find($user->id)->name,
            'events' => Event::get()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::find(2);
        return view('user.create',[
            'user' => $user,
            'name' => User::find($user->id)->name
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $task = new Task;
        // $task->name = $request->name;
        // $task->type = $request->type;
        
        // $task->save();
        // return redirect()->route('kanbans.index');
        // error_log('Some message here.');
        
        $event = new Event();
        $event->event_name = $request->event_name;
        $event->event_content = $request->event_content;
        $event->event_money = $request->event_money;
        $event->user_id = User::first()->id;
        
        
        
        $event->save();
        return redirect()->route('user.create');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show',[
            'user' => $user,
            'name' => User::find($user->id)->name,
            'detail' => User::find($user->id)
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
    public function show_detail_event(Event $event)
    {
        return view('user.detail_event',[
            'user' => User::find(2),
            'event' => Event::find($event->id)
        ]);
        
    }

    public function storeEvent(Request $request, User $user){
        
        $event = new Event();
        $event->event_name = $request->event_name;
        $event->event_content = $request->event_content;
        $event->event_money = $request->event_money;
        $event->user_id = $user->id;
        
        $event->save();
        return redirect()->route('user.create');
    }

}
