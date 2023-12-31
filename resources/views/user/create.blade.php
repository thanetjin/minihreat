@extends('layouts.main')

@section('content')
    <div class="grid grid-cols-3">
        <div class="relative col-span-1">
            <img src="{{ URL('images/create_event_background.jpg')}}" 
                alt="image create event" 
                class="absolute h-screen w-full rounded-[50px] -left-14 ">
        </div>
        <div class="col-span-2 p-4">
            <form action="{{ route('user.storeEvent', ['user' => $user]) }}" method="POST" enctype="multipart/form-data"> 
                

                @csrf
                <div class="mt-5">
                    <label for="topic" class="block mb-2 text-sm font-medium text-gray-900">รหัสโรงงาน</label>
                    <input type="text" name="serial_number" id="topic" 
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="กรุณากรอกรหัสโรงงาน"  value="{{ old('serial_number') }}"
                    required>
                </div>
                <div class="mt-5">
                    <label for="topic" class="block mb-2 text-sm font-medium text-gray-900">ชื่อโรงงาน</label>
                    <input type="text" name="name" id="topic"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="กรุณากรอกชื่อโรงงาน" value="{{ old('name') }}"
                    required>
                </div>
                <div class="mt-5">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">ที่อยู่โรงงาน</label>
                    <textarea name="address"  id="description"  rows="10" 
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
                            placeholder="กรุณาใส่ที่อยู่ของโรงงาน"  required>{{ old('address') }}</textarea>
                </div>
                <div class="mt-5">
                    <label for="member" class="block mb-2 text-sm font-medium text-gray-900">จำนวนคนที่ต้องการ</label>
                    <input type="number" id="member" name="member" min="1" max="10"
                        placeholder="กรุณาใส่จำนวนคนที่ต้องการ"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        value="8" 
                    required>
                </div>
                <div class="mt-5">
                    <label class="block">
                        <span class="text-gray-700">กำหนดการปฏิบัติงาน</span>
                        <input type="datetime-local"  name="date" class="block w-full mt-1 rounded-md text-gray-900 bg-gray-50 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " value="{{ old('topic') }}"
                               placeholder="" required value="{{old('date')}}"/>
                    </label>
                    @error('date')
                    <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

    <div class="mt-4">
<label class="block mb-2 text-md font-medium text-gray-700" dark:text-white" for="file_input">อัพโหลดรูปโรงงาน</label>
<input name="image_path" class="block w-full text-md text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" required>
</div>

                                
                
                <span class="flex justify-center mt-5">
                    <button type="submit" class="flex border border-black mx-auto px-12 py-2 rounded-lg text-sm hover:bg-black hover:text-white" id="box-button">
                        เพิ่มโรงงาน
                        <svg class="w-3 h-3 ml-3 mt-1 text-gray-800" id="icon-arrow" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        option{
            overflow-y: scroll;
        }
        #box-button:hover #icon-arrow {
            color: white !important;
        }
    </style>
@endsection