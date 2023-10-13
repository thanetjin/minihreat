<?php

namespace App\Http\Controllers;

use App\Models\Event;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index',[
            // user first คือ admin
            'user' => User::first(),
            // query database laravel 
            'events' => Event::where('is_allow','SENDING')->get()
        ]);
    }

    // ยังนึกไม่ออกว่าจะมีทำไมแฮะๆ สำหรับ store
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
    // คอนเฟิร์ม event นั้นว่าจะเอาใช่ไหม
    public function confirm(Event $event){
        return view('admin.confirm',[
            'user' => User::first(),
            'event' => $event,
            'owner' => User::find($event->user_id)->name
        ]);
    }
    // ข้อมูลในการปฏิเสธ event นั้นๆ
    public function reject(Event $event){
        return view('admin.reject',[
            'user' => User::first(),
            'event' => $event
        ]);
    }
    // เหตุผลในการปฏิเสธ event นั้นๆ
    public function reason(Request $request, Event $event){
        $request->validate([
            'reason' => ['required','string','min:4']
        ],[
            'reason' => 'กรุณาใส่เหตุผลการส่ง'
        ]);

        $event->is_allow = 'REJECT';
        $event->rejection_reason = $request->get('reason');
        $event->save();
        
        return redirect()->route('admin.index');
    }

    // เปลี่ยนสถานะว่าให้ถูกยอมรับ event นั้นๆ
    public function accept(Event $event){
        $event->is_allow = 'ACCEPT';
        $event->save();
        return redirect()->route('admin.index');
    }
    //สร้าง staff คนใหม่ขึ้นมา
    public function createStaff(Request $request){
        return view('admin.createStaff',[
            'user' => User::first(),                        
        ]);        
    }
    public function showStaff(Request $request){
        return view('admin.showStaff',[
            'user' => User::first(),                        
        ]);
    }
    public function createAsset(Request $request){
        return view('admin.createAsset',[
            'user' => User::first(),                        
        ]);        
    }
    
    public function handleStaffButton(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],[
            'password.required' => 'กรุณากรอกรหัสผ่าน',
            'password.confirmed' => 'กรุณากรอกรหัสผ่านตรงกัน',            
            'email.unique' => 'อีเมลนี้มีคนใช้งานแล้ว',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'staff';
        $user->save();        
        return redirect()->route('admin.index')->with('success','คุณได้ทำการสมัครสมาชิกเรียบร้อยแล้ว');        
    }
    public function handleAssetButton(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'asset';
        $user->save();        
        return redirect()->route('admin.index');
    }
    
}
