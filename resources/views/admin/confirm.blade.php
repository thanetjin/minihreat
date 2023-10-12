@extends('layouts.main')

@section('content')
<div class="grid grid-cols-3 gap-4">
    <div class="relative">
        <img class="absolute rounded-r-lg -left-4" src="{{URL('images/create_event_background.jpg')}}" alt=""> 
    </div>

    <div class="col-span-2 block p-8 bg-white border border-gray-200 rounded-lg shadow h-fit">

            <p class="text-gray-500 mb-2">หัวข้อ</p>
            <p class="border border-gray-300 rounded-lg bg-gray-200 w-full p-2 mb-2">{{ $event->name }}</p>
            <p class="text-gray-500 mb-2">เนื้อหา</p>
            <p class="border border-gray-300 rounded-lg bg-gray-200 shadow break-words p-2 mb-2">{{ $event->address }}</p>
            <p class="text-gray-500 mt-5 mb-2">ชื่อ หรือ ผู้รับผิดชอบ โปรเจค</p>
            <p class="border border-gray-300 rounded-lg bg-gray-200 shadow p-2 mb-2">{{ $owner }}</p>
            <p class="text-gray-500 mt-5 mb-2">จำนวนคนในโปรเจค</p>
            <p class="border border-gray-300 rounded-lg bg-gray-200 shadow p-2 mb-2">{{ $event->member }} คน</p>
            



        <div class="flex justify-end">
            <a href="{{route('admin.reject',['event' => $event])}}" class="flex py-1 px-5 mr-3 mb-2 text-sm font-semibold text-white bg-red-500 rounded-lg border border-gray-900 bg-red-500 hover:bg-white hover:text-black my-10">
                ปฎิเสธคำร้อง
                <svg class="w-3 h-3 ml-3 mt-1 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
            <form action="{{route('admin.accept', ['event' => $event])}}" method="POST">
                @csrf
                <button type="submit" class="flex focus:outline-none text-black bg-yellow-300 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-semibold rounded-lg text-sm px-5 py-1 mr-2 mb-2 my-10">
                    ยอมรับคำร้อง
                    <svg class="w-3 h-3 ml-3 mt-1 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </button>
            </form>
        </div>

    </div>

@endsection