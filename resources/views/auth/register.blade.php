<x-guest-layout>

    <div class="md:w-1/2 px-16">
        <h2 class="font-bold text-2xl text-black">สมัครสมาชิก</h2>
        <p class="text-sm mt-4 text-black    ">
            กรุณากรอกเพื่อสมัครสมาชิก
        </p>

        <form method="POST" class="flex flex-col gap-4" action="{{ route('register') }}">
            @csrf


        <!-- Username -->
        
            <x-text-input id="name" class="p-2 mt-8" placeholder="username" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                
        

            {{-- email --}}
            <x-text-input id="email" class="p-2" type="email" name="email" placeholder="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            {{-- password --}}
            <x-text-input id="password" class="p-2"
                            type="password"
                            name="password"
                            required autocomplete="current-password" 
                            placeholder="password"
                            />

            <!-- Confirm Password -->
            
        
            
            <x-text-input id="password_confirmation" class="p-2" placeholder="confirm password"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                {{-- duty --}}
<div>
<div class="flex items-center mb-2">
    <input  type="radio" value="eletricalEngineer" name="duty" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">นักวิทยาศาสตร์</label>
</div>
<div class="flex items-center mb-2">
    <input  type="radio" value="mechanicalEngineer" name="duty" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">วิศวกรทั่วไป</label>
</div>
<div class="flex items-center mb-2">
    <input  type="radio" value="generalEngineer" name="duty" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">วิศวเครื่องกล</label>
</div>
<div class="flex items-center mb-2">
    <input type="radio" value="scientist" name="duty" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">วิศวไฟฟ้า</label>
</div>
</div>
                
                {{-- Register Button --}}
                
                <x-primary-button class="bg-gray-700 rounded-xl text-white py-2 text-center items-center justify-center">
                    {{ __('สมัครสมาชิก') }}
                </x-primary-button>
        
        </form>

        <div class="text-xs justify-between items-center mt-16">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600">เป็นสมาชิกอยู่แล้วใช่ไหม?</a>
                <a class="underline text-sm text-blue-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('เข้าสู่ระบบที่นี่') }}
                </a>
            @endif
            
        </div>
    
    </div>
    {{-- image --}}
<div class="md:block hidden w-1/2">
<img  class="sm:block rounded-2xl hidden" src="https://images.unsplash.com/photo-1695457264636-f314b0027ca2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2574&q=80" alt="">
</div>
</x-guest-layout>
