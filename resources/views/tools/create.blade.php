@extends('layouts.main')

@section('content')
    
        
        

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('tools.store') }}">
                        @csrf                        
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700">ชื่อเครื่องมือ</span>
                                <input type="text" name="name" class="block w-full mt-1 rounded-md"
                                       placeholder="ชื่อเครื่องมือ"                                       
                                        />
                                       
                            </label>
                            @error('name')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700">คำอธิบาย</span>
                                <input type="text" name="desc" class="block w-full mt-1 rounded-md"
                                       placeholder="คำอธิบายเพิ่มเติม" />
                            </label>
                            @error('desc')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700">จำนวนทั้งหมด</span>
                                <input type="number" name="copies" class="block w-full mt-1 rounded-md"
                                       placeholder="จำนวนทั้งหมด" />
                            </label>
                            @error('copies')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <button class="inline-flex p-4 text-xl font-semibold leading-5 text-white bg-black rounded-full hover:bg-slate-800 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300  py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" type="submit">
                            เพิ่มอุปกรณ์
                        </button>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
