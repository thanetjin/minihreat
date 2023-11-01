@extends('layouts.main')

@section('content')

@php
    $counter = 1;
@endphp
@php use Carbon\Carbon; @endphp

@php
    $counter_allow_sending = 0;
    $counter_allow_accept = 0;
    $counter_allow_success = 0;    
@endphp
@php
    $counter_tool = 0;
    $counter_borrow = 0;
    
@endphp
{{-- @foreach ($tools as $tool)

        @if ($event->is_allow === 'SENDING')
            @php
                $counter_allow_sending++
            @endphp            
        @endif
        @if ($event->status)
            @php
                $counter_allow_success++
            @endphp            
        @endif
        
        @if ($event->is_allow === 'ACCEPT')
            @php
                $counter_allow_accept++;
            @endphp            
        @endif        
        @endforeach --}}

@if ($message = Session::get('success'))
<div
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-7/12  text-center mx-auto m-5"
                    role="alert">
                    <span class="block sm:inline">{{ session()->get('status') }}</span>
                    {{ $message}}
                </div>
@endif
@if (Auth::user()->role === "asset")
    

<ul class="flex flex-col md:grid grid-cols-2 gap-5 text-redis-neutral-800 max-w-2xl mx-auto p-10 mt-10">
    <li
        class="w-full text-sm font-semibold text-slate-900 p-6 bg-white border border-slate-900/10 bg-clip-padding shadow-md shadow-slate-900/5 rounded-lg flex flex-col justify-center">
        <span class="mb-1 text-[#2ed4c0] font-display text-5xl">{{$tools->count()}}</span>
        {{-- ['ACCEPT','REJECT','SENDING'] --}}        
        จำนวนอุปกรณ์
    </li>
    <li
        class="w-full text-sm font-semibold text-slate-900 p-6 bg-white border border-slate-900/10 bg-clip-padding shadow-md shadow-slate-900/5 rounded-lg flex flex-col justify-center">
        <span class="mb-1 text-[#2ed4c0] font-display text-5xl">{{$loans->count()}}</span>
        จำนวนยืม
    </li>

</ul>
@endif
@if (Auth::user()->role === "user" || Auth::user()->role === "staff")

@foreach ($events as $event)

        @if ($event->is_allow === 'SENDING')
            @php
                $counter_allow_sending++
            @endphp            
        @endif
        @if ($event->is_allow === 'REJECT')
            @php
                $counter_allow_success++
            @endphp            
        @endif
        {{-- $table->enum('is_allow', ['ACCEPT','REJECT','SENDING'])->default('SENDING');  --}}

        {{-- @if ($event->is_allow === 'ACCEPT')
            @php
                $counter_allow_accept++;
            @endphp            
        @endif         --}}
        @endforeach

<ul class="flex flex-col md:grid grid-cols-2 gap-5 text-redis-neutral-800 max-w-2xl mx-auto p-10 mt-10">
    <li
        class="w-full text-sm font-semibold text-slate-900 p-6 bg-white border border-slate-900/10 bg-clip-padding shadow-md shadow-slate-900/5 rounded-lg flex flex-col justify-center">
        <span class="mb-1 text-[#2ed4c0] font-display text-5xl">{{$counter_allow_sending}}</span>
        {{-- ['ACCEPT','REJECT','SENDING'] --}}
        

        กำลังรอการอนุมัติ
    </li>
    
    
    <li
        class="w-full text-sm font-semibold text-slate-900 p-6 bg-white border border-slate-900/10 bg-clip-padding shadow-md shadow-slate-900/5 rounded-lg flex flex-col justify-center">
        <span class="mb-1 text-[#2ed4c0] font-display text-5xl">{{$counter_allow_success}}</span>
        ถูกปฏิเสธ
    </li>
</ul>


<div class="flex items-center justify-center text-center">

@if($user->is_available == false)
<a href="{{ route('user.change_available',['user' => $user])}}"  class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full hover:bg-green-900 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300  py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">สถานะตอนนี้พร้อมทำงาน</a>
@endif
@if($user->is_available == true)
<a href="{{ route('user.change_available',['user' => $user])}}"  class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full hover:bg-red-900 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300  py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">สถานะตอนนี้ไม่ว่าง</a>
@endif
</div>


    {{-- <div class="relative grid mb-10">
        <!-- <img src="{{ URL('images/background-user.jpg') }}" 
        class="bg-center h-[30%] w-full"/> -->
        <img src="{{ URL('images/giphy.gif')}}" class="h-[30vh] w-full rounded-lg">
        <p class="absolute text-3xl place-self-center font-extrabold text-black tracking-widest md:text-5xl ">แหล่งรวบรวมอีเว้นท์ที่น่าสนใจ</p>
    </div> --}}
    
    <div class="container mx-auto grid grid-cols-2 gap-10">
        @foreach ($events as $event)
            <div class="flex flex-col  items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row">
                {{-- <img class = "h-auto max-w-lg rounded-lg" src="{{ URL('images/card-header.png') }}"> --}}
                {{-- <img class = "h-auto max-w-lg rounded-lg" src="{{ URL('images/card-header.png') }}"> --}}
                @if($event->image)
                <img class="w-40 h-40 object-cover rounded-lg" src="{{ asset('storage/' . $event->image) }}">
            @else
                <img class="h-auto max-w-lg rounded-lg" src="images/card-header.png" alt="default image">
            @endif
            
                    <div class="flex flex-col justify-between p-4 leading-normal truncate w-full">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">{{ $event->name }}</h5>
                        <h1 class="mb-3 font-normal text-sm text-gray-700 ">{{ $event->address }}</h1>
                        
                        <h1 class="text-gray-500 whitespace-no-wrap border-gray-200">
                            {{Carbon::parse($event->created_at)->format('g:i a l jS F, Y')}}
                        {{-- member event --}}
                        {{-- <h1>{{$event->event_member}}</h1> --}}
                        @foreach ($event->users as $user)
                            
                            @php
                            $counter++;
                            @endphp
                        @endforeach                        
                        <h2>{{$counter}}<span>/</span>{{$event->member}}</h2>

                        <div class="flex justify-end items-center text-center space-x-3">
                            
                            
                            @if($event->is_allow == 'SENDING' && $event->status == false)
                            <p class="text-yellow-400">กำลังรอการอนุมัติ</p>
                            @endif
                            @if($event->is_allow == 'ACCEPT' && $event->status == false)
                            <p class="text-green-400">กำลังดำเนินการ</p>
                            @endif
                            @if($event->is_allow == 'REJECT' && $event->status == false)
                            <p class="text-red-400">ถูกปฏิเสธโดยเจ้าหน้าที่</p>
                            @endif
                            @if($event->status)
                            <p class="text-red-400">การตรวจโรงงานสำเร็จแล้ว</p>
                            @endif  
                            @if (($event->is_allow == "ACCEPT" && $event->status == false) || ($event->is_allow == 'REJECT' ))
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
        @endif
        
    </div>
    
@endsection