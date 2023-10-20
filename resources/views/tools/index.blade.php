
@extends('layouts.main')

@section('content')


</div>

@if (Auth::user()->role === "user")
    <h2 class="m-6 text-3xl font-semibold text-gray-900 text-center">ยืมอุปกรณ์</h2>    
    
    @endif
    
    @if (Auth::user()->role === "asset")
    <div class="text-center justify-center items-center">
    <a class="inline-flex p-4 text-xl font-semibold leading-5 text-white bg-black rounded-full hover:bg-slate-800 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300  py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" href="{{ route('tools.show') }}">ดูรายชื่อผู้ยืมทั้งหมด</a>                    
</div>
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
                @if (Auth::user()->role === "user" || Auth::user()->role === "staff")                                    
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