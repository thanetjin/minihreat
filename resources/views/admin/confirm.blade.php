@extends('layouts.main')

@section('content')




<div class="grid grid-cols-3 gap-4 h-[80vh]">
    
    <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow">
        <img src="https://content.magnumphotos.com/wp-content/uploads/2019/05/cortex/par196080-teaser-story-big.jpg" alt="" class="h-screen"> 
    </div>

    <div class="col-span-2 block p-6 bg-white border border-gray-200 rounded-lg shadow h-full">
        <div class="text-gray-500">หัวข้อ</div>
        <div class="rounded-lg w-1/4">ชื่อหัวข้อ</div>
        <div class="text-gray-500">เนื้อหา</div>
        <div class="rounded-lg w-1/4">รายละเอียดเนื้อหา</div>
        <div class="text-gray-500 mt-5">ชื่อ หรือ ผู้รับผิดชอบ โปรเจค</div>
        <div class="rounded-lg w-1/4">ชื่อ</div>
        <div class="text-gray-500 mt-5">จำนวนคนในโปรเจค</div>
        <div class="rounded-lg w-1/4">เลขจำนวน</div>
        <div class="text-gray-500 mt-5">งบประมาณ</div>
        <div class="rounded-lg w-1/4">เลขจำนวนงบประมาณ</div>


        <div class="flex justify-end">
            <a href="{{route('admin.reject')}}" class="flex py-1 px-5 mr-3 mb-2 text-xs font-semibold text-white bg-red-500 rounded-lg border border-gray-900  bg-red-500 hover:bg-white hover:text-black my-10">
                ปฎิเสธคำร้อง
                <svg class="w-3 h-3 ml-3 mt-1 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
            <button type="button" class="flex focus:outline-none text-black bg-yellow-300 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-semibold rounded-lg text-sm px-5 py-1 mr-2 mb-2 dark:focus:ring-yellow-900 my-10">
                ยอมรับคำร้อง
                <svg class="w-3 h-3 ml-3 mt-1 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </button>
    </div>
</div>

@endsection