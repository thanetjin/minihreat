<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Event;
use App\Models\User;
use App\Models\Task;
use App\Models\Tool;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // return view('tools.index', ['user' => $user,'tools' => Tool::paginate(10),'loans' => Loan::paginate(10)]);
        $user = Auth::user();
        return view('user.index',[
            'user' => $user,            
            'events' => Event::get(),
            'tools' => Tool::get(),
            'loans' => Loan::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    //  สร้าง event
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

    //  สร้างเสร็จไปที user.index
    public function store(Request $request)
    {
        return redirect()->route('user.index');
        
    }

    /**
     * Display the specified resource.
     */

    //  โชว์พวกเกียติบัตรของ user
    public function show(User $user)
    {
        $user = Auth::user();
        return view('user.show',[
            'user' => $user,
            'events' => Event::get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */

    //แก้ไขข้อมูลส่วนตัวของ user
    public function edit(User $user)
    {
        $user = Auth::user();
        return view('user.edit',[
            'user' => $user,
            
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
    
    public function showCreateEvent(Event $event){
        $user = Auth::user();
        return view('user.showCreateEvent',[
            'user' => $user,            
            'events' => Event::get()
        ]);
    }

    
    public function show_detail_event(Event $event)
    {
        
        return view('user.detail_event',[
            'user' => Auth::user(),
            'event' => Event::find($event->id)
            
        ]);   
    }
    public function enterEvent(Event $event)
    {   $user = Auth::user();
        $event->users()->attach(Auth::user()->id);
        // return redirect()->route('kanbans.index')->with("success", "คุณได้ทำการเข้าร่วมแล้ว!");
        return redirect()->route('kanbans.index',['user' => $user,            
        'event' => $event])->with("success", "คุณได้ทำการเข้าร่วมแล้ว!");
    }

    // เกิดขึ้นเมื่อ user กดปุ้มสร้าง event
    public function storeEvent(Request $request, User $user){


        $request->validate([
            'date' => 'required|date|after:now',
            'member' => 'min:1|max:10'            
        ],[
            'date.after' => 'กรุณากรอกเวลาที่ไม่ใช่อดีต',            
            'member.min' => 'กรุณากรอกจำนวนมากกว่า1คน',            
            'member.max' => 'กรุณากรอกจำนวนน้อยกว่า10คน',            

        ]);
        
        
        $event = new Event();        
        $event->name = $request->name;
        $event->address = $request->address;        
        $event->user_id = $user->id;
        $event->member = $request->member;
        $event->serial_number = $request->serial_number;
        $event->date = $request->date;    
        if ($request->hasFile('image_path')) {
            // บันทึกไฟล์รูปภาพลงใน folder ชื่อ 'artist_images' ที่ storage/app/public
            $path = $request->file('image_path')->store('event_images', 'public');
            $event->image = $path;
        }
        $event->save();
        return redirect()->route('user.index')->with("success", "คุณได้ทำการสร้างห้องสำหรับตรวจสอบโรงงานแล้ว!");
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

        return back()->with("status", "คุณได้ทำการเปลี่ยนรหัสผ่านเป็นที่เรียบร้อยแล้ว!");
}
        public function change_available(Request $request,User $member)
        {
            $user = Auth::user();
            $statusForUser = false;
            if($user->is_available == true){
                $statusForUser = false;
            }
            if($user->is_available == false){
                $statusForUser = true;
            }
            
            // if($member->is_available){
            //     $member->is_available = false;
            // }else{
            //     $member->is_available = true;
            // }
                        
            User::whereId(auth()->user()->id)->update([
                // 'is_available' => $member->is_available
                'is_available' => $statusForUser
            ]);            
            return redirect()->route('user.index')->with("success", "คุณได้เปลี่ยนสถานะแล้ว!");;
        }
        public function terminate(User $user): RedirectResponse {
            $user->terminate();    
            return redirect()->route('user.index');
        }

}