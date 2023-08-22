@extends('layouts.main')

@section('content')

<style>

#box-button:hover #icon-logout {
  color: white !important;
}
</style>

    <div class="container mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow">
                @if($user->image)
                    <img class="w-[97px] h-[95px] mx-auto rounded-full" src="{{ asset('storage/' . Auth::user()->image)}}" alt="admin image">
                @else
                    <img class="w-[97px] h-[95px] mx-auto rounded-full" src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="default image">
                @endif
            <div class="flex justify-center my-2">
                <p class="text-center text-2xl">{{$user->name}}</p>
            </div>
            <div class="p-6 bg-white">
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="flex justify-center border w-[10%] mx-auto py-2 rounded-lg border-red-700 text-red-700 hover:bg-red-700 hover:text-white" id="box-button">
                    
                        <svg class="w-3 h-6 mr-4 text-red-700" id="icon-logout" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3"/>
                        </svg>
                        log out
                    </button>
                </form>
                
            </div>
    
    </div>
    <div class="container mx-auto mt-5">
        <span class="flex justify-center">
            <div class="p-4 text-center text-2xl mx-auto">
                คำร้อง
            </div>
        </span>
        @if($events->count() > 0)
            <div class="overflow-y-scroll h-[70vh]">
                @foreach ($events as $event)
                    <div class="mb-5 h-fit flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row">
                        <img class="w-full rounded-t-lg h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{URL('images/card-header.png')}}" alt="images for event">
                        <div class="flex flex-col justify-between p-4 leading-normal w-full">
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">{{ $event->event_name }}</h5>
                            <p class="mb-3 font-normal text-sm text-gray-700">{{ $event->event_content }}</p>
                            <div class="flex justify-end mt-2">
                                <a href="{{route('admin.confirm', ['event' => $event] )}}" class="flex py-1 px-5 mr-3 mb-2 text-sm font-semibold text-black focus:outline-none bg-white rounded-lg border border-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">
                                    รายละเอียดเพิ่มเติม
                                    <svg class="w-3 h-3 ml-3 mt-1 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex h-[70vh] border rounded-lg">
                <div class="flex self-center text-gray-500 mx-auto">
                    <svg class="w-6 h-6 text-gray-800 mr-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M15.133 10.632v-1.8a5.406 5.406 0 0 0-4.154-5.262.955.955 0 0 0 .021-.106V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C4.867 13.018 3 13.614 3 14.807 3 15.4 3 16 3.538 16h12.924C17 16 17 15.4 17 14.807c0-1.193-1.867-1.789-1.867-4.175ZM4 4a1 1 0 0 1-.707-.293l-1-1a1 1 0 0 1 1.414-1.414l1 1A1 1 0 0 1 4 4ZM2 8H1a1 1 0 0 1 0-2h1a1 1 0 1 1 0 2Zm14-4a1 1 0 0 1-.707-1.707l1-1a1 1 0 1 1 1.414 1.414l-1 1A1 1 0 0 1 16 4Zm3 4h-1a1 1 0 1 1 0-2h1a1 1 0 1 1 0 2ZM6.823 17a3.453 3.453 0 0 0 6.354 0H6.823Z"/>
                    </svg>
                    ไม่มีคนส่งคำร้อง
                </div>
            </div>
        @endif

    </div>

@endsection