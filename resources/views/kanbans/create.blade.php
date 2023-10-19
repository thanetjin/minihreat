@extends('layouts.main')

@section('content')
    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('อุปกรณ์ที่ต้องการยืมคือ ') }} "{{$event->name}}"
        </h2>
        

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('kanbans.store', ['event' => $event]) }}">
                        @csrf 
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700">ตำแหน่งหน้าที่ของคุณ</span>
                                <input type="text" name="role" class="block w-full mt-1 rounded-md"
                                       placeholder="กรุณากรอกจำนวนที่ต้องการยืม?"
                                       value="Enginner"/>                                                                              
                            </label>
                            @error('role')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700">ชื่อ</span>
                                <input type="text" name="name" class="block w-full mt-1 rounded-md"
                                       placeholder="กรุณากรอกจำนวนที่ต้องการยืม?"
                                       value={{ $user->name}} >                                                                              
                            </label>
                            @error('name')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-6">
                            <input type="checkbox" name="duty[]" value="การจัดการเกี่ยวกับสายไฟ" id="">
                            <label for="">การจัดการเกี่ยวกับสายไฟ</label>
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <input type="checkbox" name="duty[]" value="เข็คระบบขัดข้องของเครื่องกล" id="">
                            <label for="">เข็คระบบขัดข้องของเครื่องกล</label>
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <input type="checkbox" name="duty[]" value="เช็คความเร็วเน็ต" id="">
                            <label for="">เช็คความเร็วเน็ต</label>
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>                                              
                        <x-primary-button type="submit">
                            ยืนยันแบบฟอร์ม
                        </x-primary-button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
