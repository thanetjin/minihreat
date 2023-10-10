@php use Carbon\Carbon; @endphp

@extends('layouts.main')

@section('content')
{{-- debug --}}
@foreach ($user->loans as $loan)
    {{ $loan->name}}
@endforeach
    <div class="py-12">
        <div class="shadow-sm sm:rounded-lg">
            <div class="mx-auto sm:px-6 lg:px-8">
                @if (session()->has('status'))
                    <div
                        class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-7/12  text-center mx-auto m-5"
                        role="alert">
                        <span class="block sm:inline">{{ session()->get('status') }}</span>
                    </div>
                @endif


                {{-- @if($loans->count() > 0) --}}
                
                @if (!empty($loans))                    

                    <table class="mx-auto">
                        <thead>
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                #
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                เครื่องมือ
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                จำนวนที่ต้องการยืม
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                เวลาในการคืน
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                
                            </th>
                        </tr>
                        </thead>


                        <tbody class="bg-white">
                        @foreach($loans as $loan)                                                
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $loop->index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium leading-5 text-gray-900">
                                            {{$loan->tool->name}}
                                        </div>
                                    </div>
                                </td>


                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-500">{{$loan->number_borrowed}}</div>
                                </td>


                                <td
                                    class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                    {{Carbon::parse($loan->return_date)->format('l jS F, Y')}}
                                </td>
                                <td
                                    class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                    <a href="{{ route('loans.terminate', ['loan' => $loan->id]) }}">คืนเครื่องมือ</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h1 class="m-6 text-3xl font-semibold text-gray-900 text-center">ไม่พบรายการการยืม</h1>
                @endif
            </div>
        </div>
    </div>
@endsection