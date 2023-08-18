@extends('layouts.main')

@section('content')
<!-- <h1 class="text-5xl text-center">
    User : {{ $user }}
</h1> -->

    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-1">
            
            <div class="h-screen p-4 shadow rounded-lg bg-white">
                <img src="" alt="user profile" class="rounded-full w-[97px] h-[95px] bg-gray-800 mx-auto my-10">
                <div class="flex justify-center mb-5">
                    <p class="font-semibold text-2xl text-center">{{$user}}</p>

                    <a href="{{ route('user.edit', ['user' => 'Profile']); }}">
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
                    <p class="h-[30vh]"></p>
                    <div class="flex justify-center mb-4">
                        <div class="text-center mr-5">
                            <p>จำนวนกิจกรรมที่เข้าร่วม</p>
                            <p> 0 </p>
                        </div>
                        <div style="border-left: 3px solid black; height:50px;"></div>
                        <div class="text-center ml-5">
                            <p>จำนวนที่ได้รับกิจกรรม</p>
                            <p> 0 </p>
                        </div>
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
                <a href="{{ route('user.show', ['user' => $name]) }}" class="px-4 py-2 text-xl font-semibold text-gray-900 bg-transparent border border-gray-900 rounded-l-lg hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white">
                    กิจกรรมที่เข้าร่วม
                </a>
                <a href="{{ route('user.certificate', ['Profile' => $name]) }}" class="px-4 py-2 text-xl font-semibold text-gray-900 bg-transparent border border-gray-900 rounded-r-md hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white">
                    ได้รับเกียรติบัตร
                </a>
                
                @if (($detail->role) === 'staff')
                <a href="{{ route('user.showCreateEvent', ['Profile' => $name]) }}" class="px-4 py-2 text-xl font-semibold text-gray-900 bg-transparent border border-gray-900 rounded-r-md hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white">
                    กิจกรรมที่สร้าง
                </a>
                @endif
            </span>
            <div class="grid grid-cols-1 gap-y-3 overflow-y-scroll h-[88vh]">
                @for($i = 0;$i < 4;$i++)
                    <div class="mx-auto max-w-2xl shadow p-4 bg-white rounded-md">
                        <img src="{{ URL('images/background-user.jpg') }}" alt="certificate" class="">
                        <p class="p-4 text-2xl">หัวเรื่อง</p>
                    </div>
                @endfor
            </div>

        </div>
    </div>

    <style scoped>
        #box-button:hover #icon-logout {
            color: white !important;
        }
    </style>
@endsection