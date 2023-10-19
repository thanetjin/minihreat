@extends('layouts.main')

@section('content')
    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            
        </h2>
        <h1>{{ $task->id}}</h1>
        <h1>{{ $task->name}}</h1>
        <h1>{{ $task->role}}</h1>
        

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- ['tool' => $tool->id] --}}
                    
                    <form method="POST" action="{{ route('kanbans.handleChange', ['task' => $task->id]) }}">
                        @csrf 
                        @method("PUT")
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700">ตำแหน่งหน้าที่ของคุณ</span>
                                <input type="text" name="role" class="block w-full mt-1 rounded-md"
                                       placeholder="กรุณากรอกจำนวนที่ต้องการยืม?"
                                       value={{ $task->type }}/>                                                                              
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
                                       value={{ $task->name}} >                                                                              
                            </label>
                            @error('name')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>                        
                        <div class="mb-6">
                            <input type="checkbox" name="duty[]" value= "การจัดการเกี่ยวกับสายไฟ" {{ in_array('การจัดการเกี่ยวกับสายไฟ', explode(',',$task->checklist)) ? 'checked' : ''}} id="">
                            <label for="">การจัดการเกี่ยวกับสายไฟ</label>
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <input type="checkbox" name="duty[]" value="เข็คระบบขัดข้องของเครื่องกล" id="" {{ in_array('เข็คระบบขัดข้องของเครื่องกล', explode(',',$task->checklist)) ? 'checked' : ''}}>
                            <label for="">เข็คระบบขัดข้องของเครื่องกล</label>
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <input type="checkbox" name="duty[]" value="เช็คความเร็วเน็ต" id="" {{ in_array('เช็คความเร็วเน็ต', explode(',',$task->checklist)) ? 'checked' : ''}}>
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
