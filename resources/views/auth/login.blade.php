<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="md:w-1/2 px-16">
        <h2 class="font-bold text-2xl text-black">เข้าสู่ระบบ</h2>
        <p class="text-sm mt-4 text-black    ">
            ยินดีต้อนรับ! กรุณากรอกเพื่อทำการเข้าสู่ระบบ
        </p>

        <form method="POST" class="flex flex-col gap-4" action="{{ route('login') }}">
            @csrf

            {{-- email --}}
            {{-- <input class="p-2 mt-8" type="text" name="email" placeholder="email"> --}}
            {{-- <x-input-label for="email" :value="__('Email')" /> --}}
            <x-text-input id="email" class="p-2 mt-8" type="email" name="email" placeholder="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            {{-- password --}}
            {{-- <input  class="p-2 " type="password" name="password" placeholder="password"> --}}
            {{-- <x-input-label for="password" :value="__('Password')" /> --}}

            
            <x-text-input id="password" class="p-2"
                            type="password"
                            name="password"
                            required autocomplete="current-password" 
                            placeholder="password"
                            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            

                {{-- Login Button --}}
                
                <x-primary-button class="bg-gray-700 rounded-xl text-white py-2 text-center items-center justify-center">
                    {{ __('เข้าสู่ระบบ') }}
                </x-primary-button>
            

            {{-- <button class="bg-cyan-400 rounded-xl text-white py-2">Login</button> --}}
        </form>

        <div class="text-xs justify-between items-center mt-16">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600">ยังไม่เป็นสมาชิก?</a>
                <a class="underline text-sm text-blue-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                    {{ __('สมัครสมาชิกที่นี่') }}
                </a>
            @endif
            
        </div>
    
    </div>
    {{-- image --}}
<div class="md:block hidden w-1/2">
<img  class="sm:block rounded-2xl hidden" src="https://images.unsplash.com/photo-1695457264636-f314b0027ca2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2574&q=80" alt="">
</div>

</x-guest-layout>
