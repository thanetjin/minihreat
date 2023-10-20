@extends('layouts.main')

@section('content')

<body class="font-sans text-gray-900 antialiased ">
    <section class="bg-gray-50 min-h-screen flex items-center justify-center">
        {{-- login container --}}
        <div class="bg-[#fbfbf9] flex rounded-2xl shadow-lg max-w-3xl p-5">
            {{-- form --}}             
                <div class="md:w-1/2 px-16">
                    <h2 class="font-bold text-2xl text-black">สร้างเจ้าหน้าที่ส่วนกลาง</h2>
                    <p class="text-sm mt-4 text-black    ">
                        กรุณากรอกเพื่อสร้างเจ้าหน้าที่ส่วนกลาง
                    </p>
            
                    {{-- "{{ route('user.storeEvent', ['user' => $user]) }}" --}}
                    <form method="POST" class="flex flex-col gap-4" action="{{ route('admin.handleAssetButton') }}">
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
                            {{-- Register Button --}}
                            
                            <button class="inline-flex p-4 text-xl font-semibold leading-5 text-white bg-black rounded-full hover:bg-slate-800 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300  py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                สร้างเจ้าหน้าที่ส่วนกลาง
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