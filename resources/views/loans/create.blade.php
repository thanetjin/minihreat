@extends('layouts.main')

@section('content')
    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('อุปกรณ์ที่ต้องการยืมคือ ') }} "{{$tool->name}}"
        </h2>
        

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('loans.store', ['tool' => $tool->id]) }}">
                        @csrf
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700">จำนวนที่ต้องการยืม</span>
                                <input type="number" name="number_borrowed" class="block w-full mt-1 rounded-md" min="1"
                                       placeholder="กรุณากรอกจำนวนที่ต้องการยืม?"
                                       value="{{old('number_borrowed')}}"/>
                                       
                            </label>
                            @error('number_borrowed')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700">เวลาที่ต้องการคืน</span>
                                <input type="date" name="return_date" class="block w-full mt-1 rounded-md"
                                       placeholder="" value="{{old('return_date')}}"/>
                            </label>
                            @error('return_date')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="inline-flex p-4 text-xl font-semibold leading-5 text-white bg-black rounded-full hover:bg-slate-800 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300  py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" type="submit">
                            ยืนยันการยืม
                        </button>                        

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
