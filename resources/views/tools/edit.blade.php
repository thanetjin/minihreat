@extends('layouts.main')

@section('content')
    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('อุปกรณ์ที่ต้องการแก้ไขคือ ') }} "{{$tool->name}}"
        </h2>
        

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('tools.update', ['tool' => $tool->id]) }}">
                        @csrf
                        @method("PUT")
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700">ชื่อเครื่องมือ</span>
                                <input type="text" name="name" class="block w-full mt-1 rounded-md"
                                       placeholder="ชื่อเครื่องมือ"
                                       {{-- value="{{old('number_borrowed')}}"/> --}}
                                       value="{{$tool->name}}" />
                                       
                            </label>
                            @error('name')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700">คำอธิบาย</span>
                                <input type="text" name="desc" class="block w-full mt-1 rounded-md"
                                       placeholder="คำอธิบายเพิ่มเติม" value="{{$tool->description}}"/>
                            </label>
                            @error('desc')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700">จำนวนทั้งหมด</span>
                                <input type="text" name="copies" class="block w-full mt-1 rounded-md"
                                       placeholder="จำนวนทั้งหมด" value="{{$tool->copies}}"/>
                            </label>
                            @error('copies')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <x-primary-button type="submit">
                            ยืนยันการยืม
                        </x-primary-button>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
