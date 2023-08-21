@extends('layouts.main')

@section('content')




<div class="grid grid-cols-3 gap-4 min-h-screen">
    
    <div class="relative">
        <img class="absolute min-h-screen rounded-r-lg -left-4" src="{{URL('images/create_event_background.jpg')}}" alt=""> 
    </div>

    <div class="col-span-2 block p-8 bg-white border border-gray-200 rounded-lg shadow h-full">
        <form action="{{ route('admin.reason', ['event' => $event]) }}" method="POST">
            @csrf
            <div class="mb-5">
                <p for="reason" class="text-gray-500 mb-2">เหตุผลที่ปฎิเสธ</p>
                <textarea name="reason" id="reason" class="border border-gray-300 rounded-lg bg-gray-200 w-full shadow p-2 @error('reason') border-red-600 @enderror" cols="30" rows="10" placeholder="เหตุผลในการปฏิเสธ" autocomplete="off"></textarea>
                @error('reason')
                    <div class="text-red-400">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            
            
            <div class="flex justify-end">
                <button type="submit" class="flex py-1 px-5 mr-3 mb-2 text-sm font-semibold text-white bg-red-500 rounded-lg border border-gray-900  bg-red-500 hover:bg-white hover:text-black my-10">
                    ปฎิเสธคำร้อง
                    <svg class="w-3 h-3 ml-3 mt-1 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </button>
            </div>
        </form>
            
    </div>
</div>

@endsection