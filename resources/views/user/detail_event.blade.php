@extends('layouts.main')

@section('content')

    <div class="relative grid mb-10 bg-cover bg-center" id="background">
        <!-- <img src="{{ URL('images/background-user.jpg') }}" 
        class="bg-center h-[30%] w-full"/> -->
        {{-- <p class="text-3xl place-self-center font-semibold text-white tracking-widest md:text-5xl">กิจกรรมรวมจากผู้สร้างสรรค์ {{$user->count()}}</p> --}}
    </div>

    <div class="container mx-auto  justify-center flex items-center">
        
            
            <div class="flex flex-col items-center  bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl">
                <div class="flex flex-col justify-between p-4 ">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">หัวเรื่อง : Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias, corporis neque autem doloremque placeat pariatur ipsa temporibus aliquid perferendis quos!</h5>
                    <p class="mb-3 font-normal text-sm text-gray-700">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis saepe expedita illo nobis sed assumenda vero magni necessitatibus, asperiores sint atque earum fugit molestiae consequatur eligendi tenetur? Soluta minima non aspernatur quaerat, est, quasi voluptas odio, ullam adipisci placeat pariatur praesentium vitae! Nisi provident sit incidunt, voluptatum explicabo delectus repellat quo architecto obcaecati repellendus, minima porro modi facere, dolores unde. Minus nobis dolorum, cupiditate quibusdam in earum! Quibusdam enim magnam accusantium quaerat harum aperiam debitis soluta autem, labore esse aut reiciendis laboriosam ipsam alias fugit voluptatum ex tenetur incidunt neque nulla nesciunt adipisci sunt similique? Est inventore quia minima at!</p>
                    <div class="flex justify-end">
                        
                        <button type="button" class="flex focus:outline-none text-black bg-yellow-300 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-semibold rounded-lg text-sm px-5 py-1 mr-2 mb-2 dark:focus:ring-yellow-900">
                            เข้าร่วม
                            <svg class="w-3 h-3 ml-3 mt-1 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </button>
                    </div>
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