@extends('layouts.main')

@section('content')
<!-- <h1 class="text-5xl text-center">
    User : {{ $user }}
</h1> -->

    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-1">
            
            <div class="h-screen p-4 shadow rounded-lg bg-white">
                @if($user->image)
                <img class="rounded-full w-[97px] h-[95px] bg-gray-800 mx-auto my-10" src="" alt="user photo">
            @else
                <img class="rounded-full w-[97px] h-[95px] bg-gray-800 mx-auto my-10" src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="">
            @endif
                    <div class="flex justify-center mb-5">
                    <p class="font-semibold text-2xl text-center">{{$user->name}}</p>
                    <a href="{{ route('user.edit',['user' => $user ]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" class="ml-3 mt-1 cursor-pointer" viewBox="0 0 18 18" fill="none">
                            <path d="M12.4525 6.81852L12.448 6.82482L6.02434 13.2491L7.94954 15.1736L14.3786 8.74481L12.4525 6.81852Z" fill="#1F2A37"/>
                            <path d="M2.82559 10.05L4.75078 11.9763L11.1753 5.55203L11.1816 5.54753L9.2546 3.62034L2.82559 10.05Z" fill="#1F2A37"/>
                            <path d="M1.79594 11.5658L0.0462492 16.8145C-0.0617561 17.1377 0.0228479 17.495 0.26406 17.7354C0.435068 17.9073 0.66548 18 0.900391 18C0.995796 18 1.0921 17.9847 1.18481 17.9532L6.43297 16.2033L1.79594 11.5658Z" fill="#1F2A37"/>
                            <path d="M16.9401 1.05856C15.5279 -0.352853 13.2292 -0.352853 11.817 1.05856L10.5282 2.34755L15.6521 7.47202L16.941 6.18303C18.3532 4.77072 18.3532 2.47087 16.9401 1.05856Z" fill="#1F2A37"/>
                        </svg>
                    </a>
                </div>
                <div class="py-10 px-4 border border-black font-semibold rounded-3xl">
                    <p class="">ประวัติส่วนตัว</p>
                    
                        อายุของคุณ : {{$user->age}}
                        <br />
                        สถานะของคุณ : {{$user->role}}
                    

                    
                    
                </div>
            </div>
        </div>
        <div class="col-span-2">
            <span class="flex rounded-md justify-center mb-10" role="group">
                <a href="{{ route('user.show', ['user' => $user]) }}" class="px-4 py-2 text-xl font-semibold border border-gray-900 rounded-l-lg bg-gray-900 text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white">
                    กิจกรรมที่เข้าร่วม
                </a>
                <a href="{{ route('user.certificate', ['user' => $user]) }}" class="px-4 py-2 text-xl font-semibold text-gray-900 bg-transparent border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white">
                    ได้รับเกียรติบัตร
                </a>
                {{-- <h1>{{ $event->id }}</h1> --}}
                <a href="{{ route('user.showCreateEvent', ['user' => $user]) }}" class="px-4 py-2 text-xl font-semibold text-gray-900 bg-transparent border border-gray-900 rounded-r-md hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white">
                    กิจกรรมที่สร้าง
                </a>
                
            </span>
            
            @php
                $isHave = false;
            @endphp

                @foreach ($events as $event)
                @foreach ($event->users as $member)
                    @if($user->id === $member->id)
                            @php
                                $isHave = true;
                            @endphp
                        @break
                    @endif
                    @endforeach
                @endforeach

            @if($isHave)
                <div class="overflow-y-scroll h-[88vh]">
                    @foreach ($events as $event)
                    @foreach ($event->users as $member)
                        @if($user->id === $member->id)
                            {{-- card --}}
                                <div class="h-fit flex mx-auto flex-col mt-4 items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row">
                                    <img class = "h-auto max-w-lg rounded-lg" src="{{ URL('images/card-header.png') }}">                                
                                        <div class="flex flex-col justify-between p-4 leading-normal truncate w-full">
                                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">{{ $event->event_name }}</h5>
                                            <h1 class="mb-3 font-normal text-sm text-gray-700 ">{{ $event->event_content }}</h1>
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
                            
                            @break
                        @endif
                        @endforeach
                    @endforeach
                </div>
        
            @else
                <div class="flex h-[70vh] border rounded-lg">
                    <div class="flex self-center text-gray-500 mx-auto">
                        <svg class="w-6 h-6 mr-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 19">
                            <path d="M15 1.943v12.114a1 1 0 0 1-1.581.814L8 11V5l5.419-3.871A1 1 0 0 1 15 1.943ZM7 4H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2v5a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2V4ZM4 17v-5h1v5H4ZM16 5.183v5.634a2.984 2.984 0 0 0 0-5.634Z"/>
                        </svg>
                        ยังไม่มีกิจกรรมที่คุณเข้าร่วม
                    </div>
                </div>
            @endif
        </div>
    </div>

    <style scoped>
        #box-button:hover #icon-logout {
            color: white !important;
        }
    </style>
@endsection