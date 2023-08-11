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
                    <a href="{{ route('user.edit',['user' => $name ]); }}">
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
                        อายุของคุณ : {{$detail->age}}
                        <br><br>
                        ที่อยู่ของคุณ : {{$detail->address}}
                    </div>
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
                <a href="{{ route('user.showCreateEvent', ['Profile' => $name]) }}" class="px-4 py-2 text-xl font-semibold text-gray-900 bg-transparent border border-gray-900 rounded-r-md hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white">
                    กิจกรรมที่สร้าง
                </a>
            </span>
            <div class="grid grid-cols-1 gap-y-2 overflow-y-scroll h-[88vh]">
                @for ($i = 0;$i < 20;$i++)
                <div class="mx-auto flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl">
                    <img class=" w-full rounded-t-lg h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{ URL('images/background-user.jpg') }}" alt="images for event">
                    <div class="flex flex-col justify-between p-4 leading-normal overflow-hidden text-ellipsis whitespace-nowrap">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">หัวเรื่อง</h5>
                        <p class="mb-3 font-normal text-sm text-gray-700 truncate">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, odit.</p>
                        <div class="flex justify-end">
                            <button type="button" class="flex focus:outline-none text-black bg-whtie border border-yellow-300 hover:bg-yellow-300 focus:ring-4 focus:ring-yellow-300 font-semibold rounded-lg text-sm px-5 py-1 mr-2 mb-2">
                                เข้าไปทำกิจกรรม
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none" class="mt-1 ml-3">
                                    <path d="M13.2231 7.31626C13.0171 7.31626 12.8195 7.38634 12.6738 7.51107C12.5281 7.6358 12.4463 7.80498 12.4463 7.98138V9.70136L9.88802 7.51114C9.7415 7.38999 9.54526 7.32295 9.34157 7.32446C9.13787 7.32598 8.94303 7.39593 8.79899 7.51924C8.65495 7.64256 8.57325 7.80938 8.57148 7.98377C8.56971 8.15816 8.64801 8.32617 8.78952 8.45161L11.3796 10.6698H9.33877C9.13273 10.6698 8.93513 10.7398 8.78944 10.8646C8.64375 10.9893 8.5619 11.1585 8.5619 11.3349C8.5619 11.5113 8.64375 11.6805 8.78944 11.8052C8.93513 11.9299 9.13273 12 9.33877 12H13.2231C13.4292 12 13.6268 11.9299 13.7725 11.8052C13.9182 11.6805 14 11.5113 14 11.3349V7.98138C14 7.80498 13.9182 7.6358 13.7725 7.51107C13.6268 7.38634 13.4292 7.31626 13.2231 7.31626Z" fill="#1F2A37"/>
                                    <path d="M2.66855 1.33023H4.67754C4.88358 1.33023 5.08118 1.26015 5.22687 1.13542C5.37257 1.01069 5.45441 0.841514 5.45441 0.665115C5.45441 0.488715 5.37257 0.319541 5.22687 0.194808C5.08118 0.0700744 4.88358 0 4.67754 0H0.776871C0.570832 0 0.373232 0.0700744 0.22754 0.194808C0.0818487 0.319541 0 0.488715 0 0.665115V3.99069C0 4.16709 0.0818487 4.33626 0.22754 4.461C0.373232 4.58573 0.570832 4.6558 0.776871 4.6558C0.982911 4.6558 1.18051 4.58573 1.3262 4.461C1.47189 4.33626 1.55374 4.16709 1.55374 3.99069V2.25673L4.12829 4.46092C4.27481 4.58208 4.47105 4.64912 4.67475 4.6476C4.87844 4.64609 5.07329 4.57614 5.21733 4.45282C5.36137 4.3295 5.44307 4.16269 5.44484 3.98829C5.44661 3.8139 5.3683 3.64589 5.22679 3.52045L2.66855 1.33023Z" fill="#1F2A37"/>
                                    <path d="M4.67754 10.6698H2.6367L5.22679 8.45161C5.3683 8.32617 5.44661 8.15816 5.44484 7.98377C5.44307 7.80938 5.36137 7.64256 5.21733 7.51924C5.07329 7.39593 4.87844 7.32598 4.67475 7.32446C4.47105 7.32295 4.27481 7.38999 4.12829 7.51114L1.55374 9.71533V7.98138C1.55374 7.80498 1.47189 7.6358 1.3262 7.51107C1.18051 7.38634 0.982911 7.31626 0.776871 7.31626C0.570832 7.31626 0.373232 7.38634 0.22754 7.51107C0.0818487 7.6358 0 7.80498 0 7.98138V11.3349C0 11.5113 0.0818487 11.6805 0.22754 11.8052C0.373232 11.9299 0.570832 12 0.776871 12H4.67754C4.88358 12 5.08118 11.9299 5.22687 11.8052C5.37257 11.6805 5.45441 11.5113 5.45441 11.3349C5.45441 11.1585 5.37257 10.9893 5.22687 10.8646C5.08118 10.7398 4.88358 10.6698 4.67754 10.6698Z" fill="#1F2A37"/>
                                    <path d="M13.9402 0.411041C13.8613 0.248143 13.7102 0.118717 13.5199 0.0512138C13.4258 0.0178114 13.325 0.000416519 13.2231 0H9.33877C9.13273 0 8.93513 0.0700744 8.78944 0.194808C8.64375 0.319541 8.5619 0.488715 8.5619 0.665115C8.5619 0.841514 8.64375 1.01069 8.78944 1.13542C8.93513 1.26015 9.13273 1.33023 9.33877 1.33023H11.3478L8.78952 3.52045C8.71532 3.58181 8.65614 3.6552 8.61543 3.73635C8.57471 3.81749 8.55328 3.90477 8.55238 3.99308C8.55149 4.0814 8.57114 4.16898 8.6102 4.25072C8.64927 4.33246 8.70695 4.40672 8.77989 4.46917C8.85284 4.53162 8.93958 4.581 9.03505 4.61445C9.13053 4.64789 9.23282 4.66472 9.33598 4.66395C9.43913 4.66318 9.54107 4.64484 9.63585 4.60998C9.73063 4.57512 9.81636 4.52445 9.88802 4.46092L12.4463 2.2707V3.99069C12.4463 4.16709 12.5281 4.33626 12.6738 4.461C12.8195 4.58573 13.0171 4.6558 13.2231 4.6558C13.4292 4.6558 13.6268 4.58573 13.7725 4.461C13.9182 4.33626 14 4.16709 14 3.99069V0.665115C13.9999 0.577869 13.9796 0.491508 13.9402 0.411041Z" fill="#1F2A37"/>
                                </svg>
                            </button>
                        </div>
                    </div>
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