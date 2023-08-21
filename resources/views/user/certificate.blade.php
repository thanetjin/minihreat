@extends('layouts.main')

@section('content')
<!-- <h1 class="text-5xl text-center">
    {{-- User : {{ $user }} --}}
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
                    <a href="{{ route('user.edit',['user' => $user ]); }}">
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
                    <div class="h-[30vh]">
                        อายุของคุณ : {{$user->age}}
                        <br><br>
                        ที่อยู่ของคุณ : {{$user->address}}
                        <br><br>
                        สถานะของคุณ : {{$user->role}}
                    </div>
                    
                    <button class="flex justify-center border w-[80%] mx-auto py-2 rounded-lg border-red-700 text-red-700 hover:bg-red-700 hover:text-white" id="box-button">
                        <svg class="w-3 h-6 mr-4 text-red-700" id="icon-logout" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3"/>
                        </svg>
                        log out
                    </button>
                </div>
            </div>
        </div>
        <div class="col-span-2">
            <span class="flex rounded-md justify-center mb-10" role="group">
                <a href="{{ route('user.show', ['user' => $user]) }}" class="px-4 py-2 text-xl font-semibold text-gray-900 bg-transparent border border-gray-900 rounded-l-lg hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white">
                    กิจกรรมที่เข้าร่วม
                </a>
                <a href="{{ route('user.certificate', ['user' => $user]) }}" class="px-4 py-2 text-xl font-semibold border border-gray-900 bg-gray-900 text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white">
                    ได้รับเกียรติบัตร
                </a>
                <a href="{{ route('user.showCreateEvent', ['user' => $user]) }}" class="px-4 py-2 text-xl font-semibold text-gray-900 bg-transparent border border-gray-900 rounded-r-md hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white">
                    กิจกรรมที่สร้าง
                </a>
                
            </span>
            @if($events->count() === 0)
            <div class="overflow-y-scroll h-[88vh]">
                @foreach($events as $event)
                    @foreach($event->users as $member)
                        @if($member->id === $user->id)
                        <div class="h-fit mb-5 mx-auto max-w-2xl shadow p-4 bg-white rounded-md">
                            <img src="{{ asset('storage/' . $event->event_image) }}" alt="certificate" class="">
                            <p class="p-4 text-2xl">{{ $event->event_name }}</p>
                        </div>
                            @break
                        @endif
                    @endforeach
                @endforeach
            </div>
            @else
                <div class="flex h-[88vh] border border-gray-400 rounded-lg">
                    <div class="flex self-center text-gray-500 mx-auto">
                    <svg class="w-6 h-6 mr-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 22 21">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M7.24 7.194a24.16 24.16 0 0 1 3.72-3.062m0 0c3.443-2.277 6.732-2.969 8.24-1.46 2.054 2.053.03 7.407-4.522 11.959-4.552 4.551-9.906 6.576-11.96 4.522C1.223 17.658 1.89 14.412 4.121 11m6.838-6.868c-3.443-2.277-6.732-2.969-8.24-1.46-2.054 2.053-.03 7.407 4.522 11.959m3.718-10.499a24.16 24.16 0 0 1 3.719 3.062M17.798 11c2.23 3.412 2.898 6.658 1.402 8.153-1.502 1.503-4.771.822-8.2-1.433m1-6.808a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"/>
                    </svg>
                        คุณยังไม่มีใบรองรับ
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
 
