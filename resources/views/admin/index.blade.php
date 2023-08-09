@extends('layouts.main')

@section('content')

<style>

#box-button:hover #icon-logout {
  color: white !important;
}
</style>


<div class="grid grid-cols-3 gap-4">
    <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow">
            <img class="rounded-full w-[97px] h-[95px] mx-auto"src="https://cdn.discordapp.com/emojis/918728690211389470.webp?size=96&quality=lossless" alt="">
            <div class="flex justify-center">
                <p class="text-center text-2xl">boss</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none" class="mt-2 ml-1">
                    <path d="M12.4525 6.81852L12.448 6.82482L6.02434 13.2491L7.94954 15.1736L14.3786 8.74481L12.4525 6.81852Z" fill="#1F2A37"/>
                    <path d="M2.82559 10.05L4.75078 11.9763L11.1753 5.55203L11.1816 5.54753L9.2546 3.62034L2.82559 10.05Z" fill="#1F2A37"/>
                    <path d="M1.79594 11.5658L0.0462492 16.8145C-0.0617561 17.1377 0.0228479 17.495 0.26406 17.7354C0.435068 17.9073 0.66548 18 0.900391 18C0.995796 18 1.0921 17.9847 1.18481 17.9532L6.43297 16.2033L1.79594 11.5658Z" fill="#1F2A37"/>
                    <path d="M16.9401 1.05856C15.5279 -0.352853 13.2292 -0.352853 11.817 1.05856L10.5282 2.34755L15.6521 7.47202L16.941 6.18303C18.3532 4.77072 18.3532 2.47087 16.9401 1.05856Z" fill="#1F2A37"/>
                </svg>
            </div>
            <div class="block p-6 bg-white border border-black rounded-lg">
                <p>ประวัติส่วนตัว</p>
                <p class="h-[400px]"></p>
                <button id="box-button" class="block p-6 bg-white border border-red-500 rounded-lg flex justify-center text-red-500 text-2xl hover:bg-red-500 hover:text-white">
                    <svg class="w-3 h-6 mr-4 text-red-700 mt-1 ml-1" id="icon-logout" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3"/>
                    </svg>
                    LOGOUT
                </button>
                
            </div>
    
    </div>
    <div class="col-span-2 block p-6 bg-white border border-gray-200 rounded-lg shadow">
        <span class="flex justify-center">
            <div class="p-6 bg-white border border-black rounded-lg text-center text-2xl mx-auto">
                คำร้อง
            </div>
        </span>

        <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row my-10">
            <img class=" w-full rounded-t-lg h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="https://cdn.discordapp.com/emojis/664072372017692682.webp?size=96&quality=lossless" alt="images for event">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">หัวเรื่อง</h5>
                <p class="mb-3 font-normal text-sm text-gray-700">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, minima quas? Illum eaque porro exercitationem. Culpa est, reprehenderit nobis cumque excepturi tempore commodi beatae, hic quidem, aliquid assumenda atque porro!</p>
                <div class="flex justify-end">
                    <a href="{{route('admin.confirm')}}" class="flex py-1 px-5 mr-3 mb-2 text-xs font-semibold text-black focus:outline-none bg-white rounded-lg border border-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">
                        รายละเอียดเพิ่มเติม
                        <svg class="w-3 h-3 ml-3 mt-1 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection