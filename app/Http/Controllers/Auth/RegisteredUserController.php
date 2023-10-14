<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed','min:7', Rules\Password::defaults()],
            'duty'=>['required']            
        ],[
            'password.required' => 'กรุณากรอกรหัสผ่าน',
            'password.confirmed' => 'กรุณากรอกรหัสผ่านตรงกัน',
            'password.min' => 'กรุณากรอกรหัสผ่านอย่างน้อย 7 ตัวขึ้นไป',
            'email.unique' => 'อีเมลนี้มีคนใช้งานแล้ว',
            'duty.require' => 'กรุณาเลือกบทบาท'
        ]);

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'role' => 'user',
        //     'duty' => '55',
        //     'password' => Hash::make($request->password),
        // ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'user';
        $user->is_available = true;
        $user->duty = $request->duty;        
        $user->save();        


        return redirect(RouteServiceProvider::LOGIN)->with('status','คุณได้ทำการสมัครสมาชิกเรียบร้อยแล้ว');
    }
}