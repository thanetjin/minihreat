@extends('layouts.main')

@section('content')

    {{-- <div class="relative grid mb-10 bg-cover bg-center" id="background">
        <!-- <img src="{{ URL('images/background-user.jpg') }}" 
        class="bg-center h-[30%] w-full"/> -->
        <p class="text-3xl place-self-center font-semibold text-white tracking-widest md:text-5xl">กิจกรรมรวมจากผู้สร้างสรรค์ {{$user->count()}}</p>
    </div> --}}

    <div class="relative grid mb-10 bg-cover bg-center" >
        {{-- <video autoplay loop muted plays-inline height="650px">
            <source src="https://giphy.com/embed/enqnZjh7ydrefjR1YO" type="video/mp4">
        </video> --}}
        {{-- <video src="https://giphy.com/embed/enqnZjh7ydrefjR1YO" width="480" height="270" class="giphy-embed" allowFullScreen></video> --}}
        <img src="{{ URL('images/giphy.gif')}}" class="h-[30vh] w-full">
        <p class="absolute text-3xl place-self-center font-semibold text-black tracking-widest md:text-5xl">กิจกรรมรวมจากผู้สร้างสรรค์ {{$user->count()}}</p>
    </div>

    

    <div class="container mx-auto grid grid-cols-2 gap-10">
        @for ($i = 0;$i < 4;$i++)
            
            <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl">
                <img class=" w-full rounded-t-lg h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{ URL('images/background-user.jpg') }}" alt="images for event">
                <div class="flex flex-col justify-between p-4 leading-normal overflow-hidden text-ellipsis whitespace-nowrap">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">หัวเรื่อง</h5>
                    <p class="mb-3 font-normal text-sm text-gray-700">รายละเอียดของเนื้อหา</p>
                    <div class="flex justify-end">
                        <button type="button" class="flex py-1 px-5 mr-3 mb-2 text-sm font-semibold text-black focus:outline-none bg-white rounded-lg border border-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">
                            รายละเอียด
                            <svg class="w-3 h-3 ml-3 mt-1 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </button>
                        <button type="button" class="flex focus:outline-none text-black bg-yellow-300 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-semibold rounded-lg text-sm px-5 py-1 mr-2 mb-2 dark:focus:ring-yellow-900">
                            เข้าร่วม
                            <svg class="w-3 h-3 ml-3 mt-1 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

        @endfor
    </div>

    <style>
        #background{

            height: 30vh;
        }
    </style>
@endsection