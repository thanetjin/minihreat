@extends('layouts.main')

@section('content')

    <div class="relative grid mb-10 bg-cover bg-center" id="background">
        <!-- <img src="{{ URL('images/background-user.jpg') }}" 
        class="bg-center h-[30%] w-full"/> -->
        {{-- <p class="text-3xl place-self-center font-semibold text-white tracking-widest md:text-5xl">กิจกรรมรวมจากผู้สร้างสรรค์ {{$user->count()}}</p> --}}
    </div>

    {{-- @foreach ($event->tasks as $task) --}}
    {{-- <h1>{{ task->name }}</h1>
    <h1>{{ task->type }}</h1> --}}
    {{-- {{ $loop->iteration }}.
    {{ $task->name }}
    {{ $task->type }} --}}
        
    {{-- @endforeach --}}
    <div class="container mx-auto  justify-center flex items-center">
        
            
            <div class="flex flex-col items-center  bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl">
                <div class="flex flex-col justify-between p-4 ">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">หัวเรื่อง : {{ $event->name }}</h5>
                    <p class="mb-3 font-normal text-sm text-gray-700">{{ $event->address }}</p>
                    
                    <div class="flex justify-end">
                        

                        
                    </div>
                    <h1>{{ $user->id }}</h1>
                    <h1>{{ $event->id }}</h1>
                    <a href="{{ route('user.enterEvent', ['event' => $event]) }}" class="flex py-1 px-5 mr-3 mb-2 mt-2 text-sm font-semibold text-black focus:outline-none bg-white rounded-lg border border-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 bg-yellow-300 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-semibold">
                        ยืนยันการเข้าร่วม
                        
                        <svg class="w-3 h-3 ml-3 mt-1 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>

        
    </div>

    <style>
        #background{
            background-image: url("https://images.unsplash.com/photo-1500964757637-c85e8a162699?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1203&q=80");
            height: 30vh;
        }
    </style>
@endsection