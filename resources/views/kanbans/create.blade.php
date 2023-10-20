@extends('layouts.main')

@section('content')

    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('แบบฟอร์มตรวจสอบโรงงาน : ') }} "{{$event->name}}"
        </h2>
        

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('kanbans.store', ['event' => $event]) }}">
                        @csrf 
                        
                        <div class="items-center justify-center text-center">
                        <button class="inline-flex p-4 text-xl font-semibold leading-5 text-white bg-black rounded-full hover:bg-slate-800 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300  py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                            ยืนยันการสร้างฟอร์ม
                        </button>
                        
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
