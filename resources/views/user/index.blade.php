@extends('layouts.main')

@section('content')

@php
    $counter = 1;
@endphp

@php
    $counter_allow_sending = 0;
    $counter_allow_accept = 0;
    $counter_allow_success = 0;
    
@endphp

@foreach ($events as $event)

        @if ($event->event_is_allow === 'SENDING')
            @php
                $counter_allow_sending++
            @endphp            
        @endif
        @if ($event->event_status)
            @php
                $counter_allow_success++
            @endphp            
        @endif
        
        @if ($event->event_is_allow === 'ACCEPT')
            @php
                $counter_allow_accept++;
            @endphp            
        @endif        
        @endforeach

<ul class="flex flex-col md:grid grid-cols-3 gap-5 text-redis-neutral-800 max-w-2xl mx-auto p-10 mt-10">
    <li
        class="w-full text-sm font-semibold text-slate-900 p-6 bg-white border border-slate-900/10 bg-clip-padding shadow-md shadow-slate-900/5 rounded-lg flex flex-col justify-center">
        <span class="mb-1 text-[#2ed4c0] font-display text-5xl">{{$counter_allow_sending}}</span>
        {{-- ['ACCEPT','REJECT','SENDING'] --}}
        

        กำลังรอการอนุมัติ
    </li>
    <li
        class="w-full text-sm font-semibold text-slate-900 p-6 bg-white border border-slate-900/10 bg-clip-padding shadow-md shadow-slate-900/5 rounded-lg flex flex-col justify-center">
        <span class="mb-1 text-[#2ed4c0] font-display text-5xl">{{$counter_allow_accept}}</span>
        กำลังดำเนินการ
    </li>
    
    <li
        class="w-full text-sm font-semibold text-slate-900 p-6 bg-white border border-slate-900/10 bg-clip-padding shadow-md shadow-slate-900/5 rounded-lg flex flex-col justify-center">
        <span class="mb-1 text-[#2ed4c0] font-display text-5xl">{{$counter_allow_success}}</span>
        สำเร็จลุล่วง
    </li>
</ul>

    {{-- <div class="relative grid mb-10">
        <!-- <img src="{{ URL('images/background-user.jpg') }}" 
        class="bg-center h-[30%] w-full"/> -->
        <img src="{{ URL('images/giphy.gif')}}" class="h-[30vh] w-full rounded-lg">
        <p class="absolute text-3xl place-self-center font-extrabold text-black tracking-widest md:text-5xl ">แหล่งรวบรวมอีเว้นท์ที่น่าสนใจ</p>
    </div> --}}
    
    <div class="container mx-auto grid grid-cols-2 gap-10">
        @foreach ($events as $event)
            <div class="flex flex-col  items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row">
                <img class = "h-auto max-w-lg rounded-lg" src="{{ URL('images/card-header.png') }}">
            
                    <div class="flex flex-col justify-between p-4 leading-normal truncate w-full">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">{{ $event->event_name }}</h5>
                        <h1 class="mb-3 font-normal text-sm text-gray-700 ">{{ $event->event_content }}</h1>
                        {{-- member event --}}
                        {{-- <h1>{{$event->event_member}}</h1> --}}
                        @foreach ($event->users as $user)
                            
                            @php
                            $counter++;
                            @endphp
                        @endforeach                        
                        <h2>{{$counter}}<span>/</span>{{$event->event_member}}</h2>

                        <div class="flex justify-end items-center text-center space-x-3">
                            
                            
                            @if($event->event_is_allow == 'SENDING' && $event->event_status == false)
                            <p class="text-yellow-400">กำลังรอการอนุมัติ</p>
                            @endif
                            @if($event->event_is_allow == 'ACCEPT' && $event->event_status == false)
                            <p class="text-green-400">กำลังดำเนินการ</p>
                            @endif
                            @if($event->event_is_allow == 'REJECT' && $event->event_status == false)
                            <p class="text-red-400">ถูกปฏิเสธโดยเจ้าหน้าที่</p>
                            @endif
                            @if($event->event_status)
                            <p class="text-red-400">กิจกรรมจบแล้ว</p>
                            @endif  
                            @if (($event->event_is_allow == "ACCEPT" && $event->event_status == false) || ($event->event_is_allow == 'REJECT' ))
                            <a href="{{ route('user.show_detail_event', ['event' => $event]) }}" class="flex py-1 px-5 mb-2 mt-2  text-sm font-semibold text-black focus:outline-none bg-white rounded-lg border border-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:ring-4 focus:ring-gray-200">
                                รายละเอียด
                                <svg class="w-3 h-3 ml-3 mt-1 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>
                            @endif                        
                        </div>                        
                    </div>                    
            </div>
            @php
    $counter = 1;
@endphp
        @endforeach
        
    </div>
@endsection