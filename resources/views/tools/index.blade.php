
@extends('layouts.main')

@section('content')

<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <form action="/search">
            <label
                class="mx-auto mt-8 relative bg-white min-w-sm max-w-2xl flex flex-col md:flex-row items-center justify-center border py-2 px-2 rounded-2xl gap-2 shadow-2xl focus-within:border-gray-300"
                for="search-bar">

                <input id="search-bar" placeholder="..." name="search"
                    class="px-6 py-2 w-full rounded-md flex-1 outline-none bg-white" required="">
                <button type="submit"
                    class="w-full md:w-auto px-6 py-3 bg-black border-black text-white fill-white active:scale-95 duration-100 border will-change-transform overflow-hidden relative rounded-xl transition-all">
                    <div class="flex items-center transition-all opacity-1">
                        <span class="text-sm font-semibold whitespace-nowrap truncate mx-auto">
                            Search
                        </span>
                    </div>
                </button>
            </label>
        </form>

        <svg viewBox="0 0 1024 1024"
            class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-x-1/2 [mask-image:radial-gradient(closest-side,white,transparent)]"
            aria-hidden="true">
            <circle cx="512" cy="512" r="512" fill="url(#827591b1-ce8c-4110-b064-7cb85a0b1217)" fill-opacity="0.7">
            </circle>
            <defs>
                <radialGradient id="827591b1-ce8c-4110-b064-7cb85a0b1217">
                    <stop stop-color="#3b82f6"></stop>
                    <stop offset="1" stop-color="#1d4ed8"></stop>
                </radialGradient>
            </defs>
        </svg>
    </div>
</div>

@if (Auth::user()->role === "user")
    <h2 class="m-6 text-3xl font-semibold text-gray-900 text-center">ยืมอุปกรณ์</h2>    
    
    @endif
    
    @if (Auth::user()->role === "asset")
    <a class="flex m-6 text-3xl font-semibold text-gray-900 text-center justify-center items-center" href="{{ route('tools.show') }}">รายชื่อผู้ยืมทั้งหมด</a>                    
    @endif
    
    @if ($message = Session::get('success'))
    <div
                        class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-7/12  text-center mx-auto m-5"
                        role="alert">
                        <span class="block sm:inline">{{ session()->get('status') }}</span>
                        {{ $message}}
                    </div>
    @endif

    <table class="mx-auto">
        <thead>
        <tr>
            <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                #
            </th>
            <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                ชื่อ
            </th>
            <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                คำอธิบาย
            </th> 
            
            <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                จำนวนทั้งหมด
            </th>
            @auth
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    จำนวนคงเหลือ
                </th>
            @endif
        </tr>
        </thead>

        <tbody class="bg-white">
        @foreach($tools as $tool)
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $loop->index + 1 }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <div class="flex items-center">
                        <div class="text-sm font-medium leading-5 text-gray-900">
                            {{$tool->name}}
                        </div>
                    </div>
                </td>

                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <div class="text-sm leading-5 text-gray-500">{{$tool->description}}</div>
                </td>

                

                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    @if($tool->copies < 10)
                        <span
                            class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                {{$tool->copies}}
                            </span>
                    @elseif($tool->copies < 20)
                        <span
                            class="inline-flex px-2 text-xs font-semibold leading-5 text-orange-800 bg-orange-100 rounded-full">
                                {{$tool->copies}}
                            </span>
                    @else
                        <span
                            class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                {{$tool->copies}}
                            </span>
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    @if($tool->availableCopies() < 10)
                        <span
                            class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                {{$tool->availableCopies()}}
                            </span>
                    @elseif($tool->availableCopies() < 20)
                        <span
                            class="inline-flex px-2 text-xs font-semibold leading-5 text-orange-800 bg-orange-100 rounded-full">
                                {{$tool->availableCopies()}}
                            </span>
                    @else
                        <span
                            class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                {{$tool->availableCopies()}}
                            </span>
                    @endif
                </td>
                @auth
                @if (Auth::user()->role === "user")                                    
                    <td
                        class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                    @if($tool->canBeBorrowed())
                        <a href="{{ route('loans.create', ['tool' => $tool->id]) }}">ยืมอุปกรณ์</a>
                        @else
                        <p class="text-red-600">ไม่สามารถยืมได้</p>
                        @endif
                    </td>
                    @endif
                    @if (Auth::user()->role === "asset")                                    
                    <td
                        class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">                    
                        <a href="{{ route('tools.edit', ['tool' => $tool->id]) }}">จัดการอุปกรณ์</a>                    
                    </td>
                    

                    @endif
                @endif
            </tr>
        @endforeach

        </tbody>
    </table>
    <div class="mx-auto pb-10 w-4/5">
        {{ $tools->links() }}
    </div>
@endsection