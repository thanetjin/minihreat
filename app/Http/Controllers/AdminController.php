<?php

namespace App\Http\Controllers;

use App\Models\Event;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index',[
            'user' => User::first(),
            'events' => Event::where('event_is_allow','SENDING')->get()
        ]);
    }

    public function confirm(Event $event){
        return view('admin.confirm',[
            'user' => User::first(),
            'event' => $event,
            'owner' => User::find($event->user_id)->name
        ]);
    }

    public function reject(Event $event){
        return view('admin.reject',[
            'user' => User::first(),
            'event' => $event
        ]);
    }

    public function reason(Request $request, Event $event){
        $request->validate([
            'reason' => ['required','string','min:4']
        ],[
            'reason' => 'กรุณาใส่เหตุผลการส่ง'
        ]);

        $event->event_is_allow = 'REJECT';
        $event->event_rejection_reason = $request->get('reason');
        $event->save();
        
        return redirect()->route('admin.index');
    }

    public function accept(Event $event){
        $event->event_is_allow = 'ACCEPT';
        $event->save();
        return redirect()->route('admin.index');
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
