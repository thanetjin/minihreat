@extends('layouts.main')

@section('content')
    <div class="grid grid-cols-3">
        <div class="relative col-span-1">
            <img src="{{ URL('images/create_event_background.jpg')}}" 
                alt="image create event" 
                class="absolute h-screen w-full rounded-[50px] -left-14 ">
        </div>
        <div class="col-span-2 p-4">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="mt-5">
                    <label for="topic" class="block mb-2 text-sm font-medium text-gray-900">หัวข้อ</label>
                    <input type="text" id="topic" name="topic" 
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="ใส่หัวข้อของกิจกรรม"
                    required>
                </div>
                <div class="mt-5">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">เนื้อหา</label>
                    <textarea id="description" name="description" rows="10" 
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
                            placeholder="ใส่เนื้อหาที่คุณต้องการ"></textarea>
                </div>
                <div class="mt-5">
                    <label for="budget" class="block mb-2 text-sm font-medium text-gray-900">งบประมาณ</label>
                    <input type="number" id="budget" name="budget" min="1"
                        placeholder="ใส่จำนวนงบของกิจกรรม"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    required>
                </div>
                <div class="mt-5">
                    <label class="block mb-2 text-sm font-semobold text-gray-900">เลือกคนที่จะรับอนุญาติ</label>
                    <select name="admin" id="admin" class="block p-2.5 w-full overflow-y-auto text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled selected class="hidden">╰(*°▽°*)╯</option>
                        @foreach($users as $user)
                            <option value="{{$user->name}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>

                <span class="flex justify-center mt-5">
                    <button submit="" class="flex border border-black mx-auto px-12 py-2 rounded-lg text-sm hover:bg-black hover:text-white" id="box-button">
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