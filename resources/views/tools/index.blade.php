
@extends('layouts.main')

@section('content')

    <h2 class="m-6 text-xl font-semibold text-gray-900 text-center">Laravel Library App</h2>

    <table class="mx-auto">
        <thead>
        <tr>
            <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                #
            </th>
            <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                name
            </th>
            <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                desc
            </th> 
            <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                Released Copies
            </th>
            <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                Available Copies
            </th>
            @auth
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    Actions
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
                    <div class="text-sm leading-5 text-gray-500">{{$tool->name}}</div>
                </td>

                <td
                    class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                    {{$tool->desc}}
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
                    <td
                        class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                    @if($tool->canBeBorrowed())
                        <a href="{{ route('loans.create', ['tool' => $tool->id]) }}">Borrow tool</a>
                        @else
                        <p class="text-red-600"> No copies available to borrow</p>
                        @endif
                    </td>
                @endif
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection