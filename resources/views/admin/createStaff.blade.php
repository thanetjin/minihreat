@extends('layouts.main')

@section('content')

<body class="font-sans text-gray-900 antialiased ">
    <section class="bg-gray-50 min-h-screen flex items-center justify-center">
        {{-- login container --}}
        <div class="bg-[#fbfbf9] flex rounded-2xl shadow-lg max-w-3xl p-5">
            {{-- form --}}             
                <div class="md:w-1/2 px-16">
                    <h2 class="font-bold text-2xl text-black">สร้างหัวหน้าทีม</h2>
                    <p class="text-sm mt-4 text-black    ">
                        กรุณากรอกเพื่อสร้างหัวหน้าทีม
                    </p>
            
                    {{-- "{{ route('user.storeEvent', ['user' => $user]) }}" --}}
                    <form method="POST" class="flex flex-col gap-4" action="{{ route('admin.handleStaffButton') }}">
                        @csrf
                    <!-- Username -->
                    
                        <x-text-input id="name" class="p-2 mt-8" placeholder="ชื่อผู้ใช้งาน" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    
            
                        {{-- email --}}
                        <x-text-input id="email" class="p-2" type="email" name="email" placeholder="อีเมล" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
            
                        {{-- password --}}
                        <x-text-input id="password" class="p-2"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" 
                                        placeholder="รหัสผ่าน"
                                        />
            
                        <!-- Confirm Password -->
                    
                        
                        <x-text-input id="password_confirmation" class="p-2" placeholder="ยืนยันรหัสผ่าน"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
            
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                
            
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            {{-- Register Button --}}

                                         {{-- duty --}}
<div>
    <div class="flex items-center mb-2">
        <input required type="radio" value="fireman" name="duty" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">นักอัคคีภัย</label>
    </div>
    <div class="flex items-center mb-2">
        <input required type="radio" value="chemicalEngineer" name="duty" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">วิศวกรเคมี</label>
    </div>
    <div class="flex items-center mb-2">
        <input required type="radio" value="eletricalEngineer" name="duty" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">วิศวไฟฟ้า</label>
    </div>
    </div>
                            
    <button class="justify-center items-center inline-flex p-4 text-xl font-semibold leading-5 text-white bg-black rounded-full hover:bg-slate-800 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300  py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
        สร้างหัวหน้าทีม
    </button>
                    
                    </form>                                
                </div>
                {{-- image --}}
            <div class="md:block hidden w-1/2">
            <img  class="sm:block rounded-2xl hidden" src="https://images.unsplash.com/photo-1695457264636-f314b0027ca2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2574&q=80" alt="">
            </div>

            
        

        </div>
    </section>
</body>
@endsection