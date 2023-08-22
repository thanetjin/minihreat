<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

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
        
        $user = Auth::user();
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


        $user = Auth::user();
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
        
        // $event = new Event();
        // $event->event_name = $request->event_name;
        // $event->event_content = $request->event_content;
        // $event->event_money = $request->event_money;
        // if ($request->hasFile('image_path')) {
        //     // บันทึกไฟล์รูปภาพลงใน folder ชื่อ 'artist_images' ที่ storage/app/public
        //     $path = $request->file('image_path')->store('event_images', 'public');
        //     $event->image_path = $path;
        // }
        // $event->user_id = User::first()->id;
        // $event->user_id = User::find(5)->id;
        // $event->save();
        return redirect()->route('user.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show',[
            'user' => $user,
            'events' => Event::get()
            
            // 'name' => User::find($user->id)->name,
            // 'detail' => User::find($user->id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $user = Auth::user();
        return view('user.edit',[
            'user' => $user,
            // 'name' => User::find($user->id)->name
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
            
            'user' => $user,
            'events' => Event::where('event_status',true)->get()
            // 'user' => $username,
            // 'name' => User::find(2)->name,
            // 'detail' => User::find(2)
        ]);
    }
    public function showCreateEvent(Event $event){
        $user = Auth::user();
        return view('user.showCreateEvent',[
            'user' => $user,
            // 'name' => User::find($user->id)->name,
            'events' => Event::get()
        ]);
    }

    
    public function show_detail_event(Event $event)
    {
        // 'tasks_Done' => Task::where('type','done')->get()
        return view('user.detail_event',[
            

            

            'user' => Auth::user(),
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
        

        $event->users()->attach(Auth::user()->id);
        return redirect()->route('user.index');
    }

    public function storeEvent(Request $request, User $user){
        $event = new Event();
        $event->event_name = $request->event_name;
        $event->event_content = $request->event_content;
        $event->event_money = $request->event_money;
        $event->user_id = $user->id;
        $event->event_member = $request->event_member;
        if ($request->hasFile('event_image')) {
            // บันทึกไฟล์รูปภาพลงใน folder ชื่อ 'artist_images' ที่ storage/app/public
            $path = $request->file('event_image')->store('event_image', 'public');
            $event->event_image = $path;
        }
        $event->save();
        return redirect()->route('user.index');
    }
    public function userLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function updatePassword(Request $request)
{
    $user = Auth::user();
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
}

}