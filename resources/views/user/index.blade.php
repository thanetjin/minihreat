@extends('layouts.main')

@section('content')

    <div class="relative grid mb-10">
        <!-- <img src="{{ URL('images/background-user.jpg') }}" 
        class="bg-center h-[30%] w-full"/> -->
        <img src="{{ URL('images/giphy.gif')}}" class="h-[30vh] w-full rounded-lg">
        <p class="absolute text-3xl place-self-center font-semibold text-black tracking-widest md:text-5xl">กิจกรรมรวมจากผู้สร้างสรรค์</p>
    </div>
    
    
    <div class="container mx-auto grid grid-cols-2 gap-10">
        @foreach ($events as $event)
            <div class="flex flex-col  items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row">
                <img class = "h-auto max-w-lg rounded-lg" src="{{ URL('images/card-header.png') }}">
            
                    <div class="flex flex-col justify-between p-4 leading-normal truncate w-full">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">{{ $event->event_name }}</h5>
                        <h1 class="mb-3 font-normal text-sm text-gray-700 ">{{ $event->event_content }}</h1>
                        <div class="flex justify-end items-center text-center space-x-3">
                            

                            @if($event->event_is_allow == 'SENDING')
                            <p class="text-yellow-400">กำลังรอการอนุมัติ</p>
                            @endif
                            @if($event->event_is_allow == 'ACCEPT')
                            <p class="text-green-400">กำลังดำเนินการ</p>
                            @endif
                            @if($event->event_is_allow == 'REJECT')
                            <p class="text-red-400">ถูกปฏิเสธโดยเจ้าหน้าที่</p>
                            @endif
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
@endsection