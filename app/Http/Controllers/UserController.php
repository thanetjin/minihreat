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
        // 'tasks_Todo' => Task::where('type','todo')->get(),
        // 'tasks_Inprocess' => Task::where('type','inProgress')->get(),
        // 'tasks_Done' => Task::where('type','done')->get()

        $user = User::find(2);
        return view('user.index',[
            'user' => $user,
            // 'name' => User::find($user->id)->name,
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
        if ($request->hasFile('image_path')) {
            // บันทึกไฟล์รูปภาพลงใน folder ชื่อ 'artist_images' ที่ storage/app/public
            $path = $request->file('image_path')->store('event_images', 'public');
            $event->image_path = $path;
        }
        // $event->user_id = User::first()->id;
        $event->user_id = User::find(5)->id;
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
            // 'name' => User::find($user->id)->name,
            // 'detail' => User::find($user->id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit',[
            'user' => $user,
            // 'name' => User::find(2)->name
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

    public function showCertificate(User $user){
        return view('user.certificate',[
            
            'user' => User::find(2),
            // 'user' => $username,
            // 'name' => User::find(2)->name,
            // 'detail' => User::find(2)
        ]);
    }
    public function showCreateEvent(User $user){
        return view('user.showCreateEvent',[
            'user' => User::find(2)
        ]);
    }
    public function show_detail_event(Event $event)
    {
        // 'tasks_Done' => Task::where('type','done')->get()
        return view('user.detail_event',[
            
            'user' => User::find(3),
            'event' => Event::find($event->id)
            
        ]);   
    }
    public function enterEvent(Event $event)
    {
        // return view('user.enterEvent',[
        //     'user' => User::find(5),
        //     'event' => Event::find($event->id)
        // ]);
        // $event = Event::find(1);
        $event->users()->attach(User::find(3)->id);
        return redirect()->route('user.index');
    }

    public function storeEvent(Request $request, User $user){
        
        

        $event = new Event();
        $event->event_name = $request->event_name;
        $event->event_content = $request->event_content;
        $event->event_money = $request->event_money;
        $event->user_id = $user->id;
        if ($request->hasFile('event_image')) {
            // บันทึกไฟล์รูปภาพลงใน folder ชื่อ 'artist_images' ที่ storage/app/public
            $path = $request->file('event_image')->store('event_image', 'public');
            $event->event_image = $path;
        }
        $event->save();
        return redirect()->route('user.create');
    }
}