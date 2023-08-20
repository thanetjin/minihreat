@extends('layouts.main')

@section('content')

    <div class="relative grid mb-10 bg-cover bg-center" id="background">
        <!-- <img src="{{ URL('images/background-user.jpg') }}" 
        class="bg-center h-[30%] w-full"/> -->
        <p class="text-3xl place-self-center font-semibold text-white tracking-widest md:text-5xl">กิจกรรมรวมจากผู้สร้างสรรค์ {{$user->count()}}</p>
    </div>
    

    <div class="container mx-auto grid grid-cols-2 gap-10">
        @foreach ($events as $event)
        
        
            
            <div class="flex flex-col  items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row">
                <img class = "h-auto max-w-lg rounded-lg" src="{{ URL('images/card-header.png') }}">
            
                    <div class="flex flex-col justify-between p-4 leading-normal truncate w-full">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">{{ $event->event_name }}</h5>
                        <h1 class="mb-3 font-normal text-sm text-gray-700 ">{{ $event->event_content }}</h1>
                        <div class="flex justify-end items-center text-center ">
                            <a href="{{ route('user.show_detail_event', ['event' => $event]) }}" class="flex py-1 px-5 mb-2 mt-2  text-sm font-semibold text-black focus:outline-none bg-white rounded-lg border border-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:ring-4 focus:ring-gray-200">
                                รายละเอียด
                                <svg class="w-3 h-3 ml-3 mt-1 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>
                        </div>
                    </div>
            </div>

        @endforeach
    </div>

    <style>
        #background{
            background-image: url("https://images.unsplash.com/photo-1500964757637-c85e8a162699?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1203&q=80");
            height: 30vh;
        }
    </style>
@endsection