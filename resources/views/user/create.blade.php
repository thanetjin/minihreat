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
                    <label for="topic" class="block mb-2 text-sm font-medium text-gray-900">หัวข้อ</label>
                    <input type="text" name="event_name" id="topic" name="topic" 
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="ใส่หัวข้อของกิจกรรม"
                    required>
                </div>
                <div class="mt-5">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">เนื้อหา</label>
                    <textarea name="event_content"  id="description" name="description" rows="10" 
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
                            placeholder="ใส่เนื้อหาที่คุณต้องการ"></textarea>
                </div>
                <div class="mt-5">
                    <label for="member" class="block mb-2 text-sm font-medium text-gray-900">จำนวนคนในกิจกรรม</label>
                    <input type="number" id="member" name="event_member" min="1"
                        placeholder="ใส่จำนวนคนในกิจกรรม"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    required>
                </div>
                <div class="mt-5">
                    <label for="budget" class="block mb-2 text-sm font-medium text-gray-900">งบประมาณ (บาท)</label>
                    <input type="number" id="budget" name="event_money" min="1"
                        placeholder="ใส่จำนวนงบของกิจกรรม"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    required>
                </div>
                <div class="mt-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="event_image">อัปโหลด เกียรติบัตร</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="event_image" name="event_image" type="file">
                </div>
                
                <span class="flex justify-center mt-5">
                    <button type="submit" class="flex border border-black mx-auto px-12 py-2 rounded-lg text-sm hover:bg-black hover:text-white" id="box-button">
                        สร้าง
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