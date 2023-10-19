@extends('layouts.main')

@section('content')
    

    <div class="container mx-auto">
            
        <div class="p-4 shadow rounded-lg bg-white">
            @if($user->image)
                <img class="rounded-full w-[97px] h-[95px] bg-gray-800 mx-auto my-10" src="" alt="user photo">
            @else
                <img class="rounded-full w-[97px] h-[95px] bg-gray-800 mx-auto my-10" src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="">
            @endif
            <div class="flex justify-center mb-5">
                <p class="font-semibold text-2xl text-center">{{$user->name}}</p>
            </div>
        </div>
    </div>

    <div class="container mx-auto mt-8">
        <div class="w-full max-w-2xl mx-auto p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
            <form class = "space-y-6" action="{{ route('update-password',['user' => $user]) }}" method="POST">
            {{-- <form class="space-y-6" action="#"> --}}
                @csrf
                @if (session('status'))
                {{-- <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <h1 class="text-lg">{{ session('success') }}</h1>
                    </div> --}}
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <span class="font-medium">Success alert!</span> {{ session('success') }}
                    </div>
            @elseif (session('error'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <h1 class="text-lg">{{ session('error') }}</h1>
                </div>
            @endif

                <h5 class="text-xl font-medium text-gray-900 dark:text-white">แก้ใขข้อมูลส่วนตัว</h5>
                <div>
                    <label for="passwor" class="block mb-2 text-sm font-medium text-gray-900">old-password</label>
                    <input type="password" name="old_password" id="email" class="form-control @error('old_password') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Old-Password" required>
                    @error('new_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New-password</label>
                    <input type="password" name="new_password" id="password" placeholder="New-Password" class="form-control @error('new_password') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                    <input type="password" name="new_password_confirmation" id="password" placeholder="Confirm-Password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>                
                <button type="submit" class="w-full text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 font-semibold rounded-lg text-sm px-5 py-2.5 text-center">แก้ไข password</button>
            </form>
        </div>

    </div>

    <style scoped>
        #box-button:hover #icon-logout {
            color: white !important;
        }
    </style>
@endsection