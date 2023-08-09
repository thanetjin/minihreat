@extends('layouts.main')

@section('content')




<div class="grid grid-cols-3 gap-4 h-[80vh]">
    
    <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow">
        <img src="https://content.magnumphotos.com/wp-content/uploads/2019/05/cortex/par196080-teaser-story-big.jpg" alt="" class="h-screen"> 
    </div>

    <div class="col-span-2 block p-6 bg-white border border-gray-200 rounded-lg shadow h-full">
        <div class="text-gray-500">เหตุผลที่ปฎิเสธ</div>
        <div class="mt-5">
            <form action="" method="PUSH">
                @csrf
            <textarea id="rejectReson" name="rejectReson" rows="10" 
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
                    placeholder="ใส่เหตุผล"></textarea>
            </form>
        </div>

        {{-- <div class="text-gray-500">ความคิดเห็นเพิ่มเติม</div>
        <div class="border border-gray-300 rounded-lg bg-gray-200 shadow h-1/4">ความเห็น</div> --}}
        


        <div class="flex justify-end">
            <button type="button" class="flex py-1 px-5 mr-3 mb-2 text-xs font-semibold text-white bg-red-500 rounded-lg border border-gray-900  bg-red-500 hover:bg-white hover:text-black my-10">
                ปฎิเสธคำร้อง
                <svg class="w-3 h-3 ml-3 mt-1 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </button>
            
    </div>
</div>

@endsection