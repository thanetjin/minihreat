@extends('layouts.main')

@section('content')

    @php
        $check = false;
    @endphp

    


    <div class="mx-auto justify-center flex items-center">
        
        {{-- <h1  class="text-red-500">event user count :{{ $event->users->count()+1 }}</h1> --}}
            {{-- <h1  class="text-red-500">event user count :{{ $event->users->count() }}</h1> --}}
            {{-- <h2 class="text-red-500">event member : {{ $event->member }}</h2> --}}
            <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row w-1/2">
                <div class="flex flex-col justify-between p-4 w-full">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900"> {{ $event->name }}</h5>
                    
                    <p class="mb-3 font-normal text-sm text-gray-700">{{ $event->address }}</p>
                    
                    {{-- {{ $event->id}} --}}                    
                    @if ($event->is_allow == 'REJECT')
                        <h1 class="text-red-400">เหตุผลในการโดนปฏิเสธ: {{ $event->rejection_reason }}</h1>                                         
                    {{-- @elseif (($event->users->count() == $event->event_member-1) && ($event->user_id != Auth::user()->id))
                    
                        <div class="flex justify-end">
                            
                            <p class="flex py-1 px-5 mr-3 mb-2 mt-2 text-sm font-semibold text-black focus:outline-none bg-white rounded-lg border border-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 cursor-not-allowed">     
                                คนในกิจกรรมเต็มแล้ว
                            </p>
                        </div>
                    @else --}}
                            
                    
                    
                        {{-- @if ($event->users->count()+1 >= $event->member-1)                        
                        <div class="flex justify-end">                            
                            <p class="flex py-1 px-5 mr-3 mb-2 mt-2 text-sm font-semibold text-black focus:outline-none bg-white rounded-lg border border-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 cursor-not-allowed">     
                                คนในกิจกรรมเต็มแล้ว
                            </p>
                        </div>
                        @endif --}}
                    @else

                    <div class="flex justify-end">
                        
                        @if ($user->id === $event->user_id)
                            <a href="{{ route('kanbans.index', ['event' => $event]) }}" class="flex py-1 px-5 mr-3 mb-2 mt-2 text-sm font-semibold text-black focus:outline-none bg-white rounded-lg border border-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">                                             
                                ไปที่ห้องตรวจสอบโรงงาน
                                <svg class="w-3 h-3 ml-3 mt-1 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>                            
                        @else
                        
                            @foreach($event->users as $member)
                                @if($user->id === $member->id)
                                    {{-- <p class="flex py-1 px-5 mr-3 mb-2 mt-2 text-sm font-semibold text-black focus:outline-none bg-white rounded-lg border border-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 cursor-not-allowed">     
                                        เข้าร่วมอยู่แล้ว
                                    </p> --}}

                                    <a href="{{ route('kanbans.index', ['event' => $event]) }}" class="flex py-1 px-5 mr-3 mb-2 mt-2 text-sm font-semibold text-black focus:outline-none bg-white rounded-lg border border-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">                                             
                                        ไปที่ห้องตรวจสอบโรงงาน
                                        <svg class="w-3 h-3 ml-3 mt-1 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                        </svg>
                                    </a>
                                    {{-- <a href="{{ route('loans.terminate', ['loan' => $loan->id]) }}">คืนเครื่องมือ</a>                                    --}}
                                    
                                    
                                        @php
                                            $check = true;
                                        @endphp
                                    @break
                                @endif
                            @endforeach
{{-- <h1>{{ $event->users->count()+1 }}</h1>
<h1>{{ $event->member }}</h1> --}}
                            @if($check === false)
                            @if ($event->users->count()+1 < $event->member)                        
                            
                            <a href="{{ route('user.enterEvent', ['event' => $event]) }}" class="flex py-1 px-5 mr-3 mb-2 mt-2 text-sm font-semibold text-black focus:outline-none bg-white rounded-lg border border-gray-900 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 bg-yellow-300 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-semibold">
                                เข้าร่วม
                                <svg class="w-3 h-3 ml-3 mt-1 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>
                            @else
                            <div class="flex justify-end">                            
                                <p class="flex py-1 px-5 mr-3 mb-2 mt-2 text-sm font-semibold text-black focus:outline-none bg-white rounded-lg border border-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 cursor-not-allowed">     
                                    คนในกิจกรรมเต็มแล้ว
                                </p>
                            </div>
                            @endif
                            @endif

                        @endif
                    </div>
                    @endif
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