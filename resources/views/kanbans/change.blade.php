@extends('layouts.main')

@section('content')
@php
$dutyInThai = '';
@endphp


    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            
        </h2>
        {{-- <h1>{{ $task->id}}</h1>
        <h1>{{ $task->name}}</h1>
        <h1>{{ $task->role}}</h1> --}}
        

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- ['tool' => $tool->id] --}}
                    
                    
                    <form method="POST" action="{{ route('kanbans.handleChange', ['event'=>$event->id,'task' => $task->id]) }}">
                        @csrf 
                        @method("PUT")
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700">ตำแหน่งหน้าที่ของคุณ</span>
                                
                                <input type="text" name="role" class="block w-full mt-1 rounded-md disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none " disabled
                                       placeholder="กรอกตำแหน่งหน้าที่ของคุณ" 
                @if ($user->duty === "fireman")                
                value="นักอัคคีภัย"
                @elseif ($user->duty === "chemicalEngineer")
                $dutyInThai = "วิศวกรเคมี"                        
                value="วิศวกรเคมี"
                @elseif ($user->duty === "eletricalEngineer")
                $dutyInThai = "วิศวกรไฟฟ้า"
                value="วิศวกรไฟฟ้า"
                @endif

                                        >                                                                              
                            </label>
                            @error('role')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700">ชื่อ</span>
                                <input type="text" name="name" class="block w-full mt-1 rounded-md disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none"
                                       placeholder="กรอกชื่อของคุณ" disabled
                                       value={{ $user->name}} >                                                                              
                            </label>
                            @error('name')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <h1 class="text-3xl">อัคคีภัย</h1>
                        <br />                        
                        <div class="mb-6">
                            {{-- @if ($user->duty === "fireman")                
                value="นักอัคคีภัย"
                @elseif ($user->duty === "chemicalEngineer")
                $dutyInThai = "วิศวกรเคมี"                        
                value="วิศวกรเคมี"
                @elseif ($user->duty === "eletricalEngineer")
                $dutyInThai = "วิศวกรไฟฟ้า"
                value="วิศวกรไฟฟ้า"
                @endif --}}
                            
                            @if ($user->duty === "fireman")
                            <input                                  
                            type="checkbox" name="duty[]" value="มีอุปกรณ์แจ้งเหตุเพลิงไหม้ครอบคลุมทั่วอาคารโรงงาน" {{ in_array('มีอุปกรณ์แจ้งเหตุเพลิงไหม้ครอบคลุมทั่วอาคารโรงงาน', explode(',',$task->checklist)) ? 'checked' : ''}} id="">   
                            <label for="">มีอุปกรณ์แจ้งเหตุเพลิงไหม้ครอบคลุมทั่วอาคารโรงงาน</label>
                            @else
                            <input                                  
                             type="checkbox" disabled name="duty[]" value="มีอุปกรณ์แจ้งเหตุเพลิงไหม้ครอบคลุมทั่วอาคารโรงงาน" {{ in_array('มีอุปกรณ์แจ้งเหตุเพลิงไหม้ครอบคลุมทั่วอาคารโรงงาน', explode(',',$task->checklist)) ? 'checked' : ''}} id="">
                             <label  class="text-slate-500" for="">มีอุปกรณ์แจ้งเหตุเพลิงไหม้ครอบคลุมทั่วอาคารโรงงาน</label>
                            @endif                                                        
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            @if ($user->duty === "fireman")
                            <input                                  
                            type="checkbox" name="duty[]" value="มีน้ำสำรองสำหรับดับเพลิงในปริมาณที่เพียงพอที่จะส่งจ่ายน้ำให้กับอุปกรณ์ได้อย่างต่อเนื่องเป็นเวลาไม่น้อยกว่า 30 นาที" {{ in_array('มีน้ำสำรองสำหรับดับเพลิงในปริมาณที่เพียงพอที่จะส่งจ่ายน้ำให้กับอุปกรณ์ได้อย่างต่อเนื่องเป็นเวลาไม่น้อยกว่า 30 นาที', explode(',',$task->checklist)) ? 'checked' : ''}} id="">   
                            <label for="">มีน้ำสำรองสำหรับดับเพลิงในปริมาณที่เพียงพอที่จะส่งจ่ายน้ำให้กับอุปกรณ์ได้อย่างต่อเนื่องเป็นเวลาไม่น้อยกว่า 30 นาที</label>
                            @else
                            <input                                  
                             type="checkbox" disabled name="duty[]" value="มีน้ำสำรองสำหรับดับเพลิงในปริมาณที่เพียงพอที่จะส่งจ่ายน้ำให้กับอุปกรณ์ได้อย่างต่อเนื่องเป็นเวลาไม่น้อยกว่า 30 นาที" {{ in_array('มีน้ำสำรองสำหรับดับเพลิงในปริมาณที่เพียงพอที่จะส่งจ่ายน้ำให้กับอุปกรณ์ได้อย่างต่อเนื่องเป็นเวลาไม่น้อยกว่า 30 นาที', explode(',',$task->checklist)) ? 'checked' : ''}} id="">
                             <label  class="text-slate-500" for="">มีน้ำสำรองสำหรับดับเพลิงในปริมาณที่เพียงพอที่จะส่งจ่ายน้ำให้กับอุปกรณ์ได้อย่างต่อเนื่องเป็นเวลาไม่น้อยกว่า 30 นาที</label>
                            @endif                                                        
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                            {{-- <input type="checkbox" name="duty[]" value="มีน้ำสำรองสำหรับดับเพลิงในปริมาณที่เพียงพอที่จะส่งจ่ายน้ำให้กับอุปกรณ์ได้อย่างต่อเนื่องเป็นเวลาไม่น้อยกว่า 30 นาที" id="" {{ in_array('มีน้ำสำรองสำหรับดับเพลิงในปริมาณที่เพียงพอที่จะส่งจ่ายน้ำให้กับอุปกรณ์ได้อย่างต่อเนื่องเป็นเวลาไม่น้อยกว่า 30 นาที', explode(',',$task->checklist)) ? 'checked' : ''}}>
                            <label for=""> มีน้ำสำรองสำหรับดับเพลิงในปริมาณที่เพียงพอที่จะส่งจ่ายน้ำให้กับอุปกรณ์ได้อย่างต่อเนื่องเป็นเวลาไม่น้อยกว่า 30 นาที</label>
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror --}}
                        </div>
                        <div class="mb-6">
                        @if ($user->duty === "fireman")
                            <input                                  
                            type="checkbox" name="duty[]" value="มีระบบน้ำดับเพลิงและระบบดับเพลิงอัตโนมัติ และมีสภาพพร้อมใช้งาน 30 นาที" {{ in_array('มีระบบน้ำดับเพลิงและระบบดับเพลิงอัตโนมัติ และมีสภาพพร้อมใช้งาน 30 นาที', explode(',',$task->checklist)) ? 'checked' : ''}} id="">   
                            <label for="">มีระบบน้ำดับเพลิงและระบบดับเพลิงอัตโนมัติ และมีสภาพพร้อมใช้งาน 30 นาที</label>
                            @else
                            <input                                  
                             type="checkbox" disabled name="duty[]" value="มีระบบน้ำดับเพลิงและระบบดับเพลิงอัตโนมัติ และมีสภาพพร้อมใช้งาน 30 นาที" {{ in_array('มีระบบน้ำดับเพลิงและระบบดับเพลิงอัตโนมัติ และมีสภาพพร้อมใช้งาน 30 นาที', explode(',',$task->checklist)) ? 'checked' : ''}} id="">
                             <label  class="text-slate-500" for="">มีระบบน้ำดับเพลิงและระบบดับเพลิงอัตโนมัติ และมีสภาพพร้อมใช้งาน 30 นาที</label>
                            @endif                                                        
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="mb-6">
                            <input type="checkbox" name="duty[]" value="มีระบบน้ำดับเพลิงและระบบดับเพลิงอัตโนมัติ และมีสภาพพร้อมใช้งาน" id="" {{ in_array('มีระบบน้ำดับเพลิงและระบบดับเพลิงอัตโนมัติ และมีสภาพพร้อมใช้งาน', explode(',',$task->checklist)) ? 'checked' : ''}}>
                            <label for="">มีระบบน้ำดับเพลิงและระบบดับเพลิงอัตโนมัติ และมีสภาพพร้อมใช้งาน</label>
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        <div class="mb-6">
                        @if ($user->duty === "fireman")
                            <div class="mb-6"></div>
                            <input                                  
                            type="checkbox" name="duty[]" value="มีเส้นทางหนีไฟ" {{ in_array('มีเส้นทางหนีไฟ', explode(',',$task->checklist)) ? 'checked' : ''}} id="">   
                            <label for="">มีเส้นทางหนีไฟ</label>
                            @else
                            <input                                  
                             type="checkbox" disabled name="duty[]" value="มีเส้นทางหนีไฟ" {{ in_array('มีเส้นทางหนีไฟ', explode(',',$task->checklist)) ? 'checked' : ''}} id="">
                             <label  class="text-slate-500" for="">มีเส้นทางหนีไฟ</label>
                            @endif                                                        
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="mb-6">
                            <input type="checkbox" name="duty[]" value="มีเส้นทางหนีไฟ" id="" {{ in_array('มีเส้นทางหนีไฟ', explode(',',$task->checklist)) ? 'checked' : ''}}>
                            <label for="">มีเส้นทางหนีไฟ</label>
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        <h1 class="text-3xl">ไฟฟ้า</h1>
                        <br />
                        @if ($user->duty === "eletricalEngineer")
                        <div class="mb-6">
                            <input                                  
                            type="checkbox" name="duty[]" value="มีรายงานการตรวจสอบความปลอดภัยระบบไฟฟ้าประจำปี" {{ in_array('มีรายงานการตรวจสอบความปลอดภัยระบบไฟฟ้าประจำปี', explode(',',$task->checklist)) ? 'checked' : ''}} id="">   
                            <label for="">มีรายงานการตรวจสอบความปลอดภัยระบบไฟฟ้าประจำปี</label>
                            @else
                            <input                                  
                             type="checkbox" disabled name="duty[]" value="มีรายงานการตรวจสอบความปลอดภัยระบบไฟฟ้าประจำปี" {{ in_array('มีรายงานการตรวจสอบความปลอดภัยระบบไฟฟ้าประจำปี', explode(',',$task->checklist)) ? 'checked' : ''}} id="">
                             <label  class="text-slate-500" for="">มีรายงานการตรวจสอบความปลอดภัยระบบไฟฟ้าประจำปี</label>
                            @endif                                                        
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="mb-6">
                            @if ($user->duty === "eletricalEngineer")
                            <input                                  
                            type="checkbox" name="duty[]" value= "มีรายงานการตรวจสอบความปลอดภัยระบบไฟฟ้าประจำปี" {{ in_array('มีรายงานการตรวจสอบความปลอดภัยระบบไฟฟ้าประจำปี', explode(',',$task->checklist)) ? 'checked' : ''}} id="">   
                            @else
                            <input                                  
                             type="checkbox" disabled name="duty[]" value= "มีรายงานการตรวจสอบความปลอดภัยระบบไฟฟ้าประจำปี" {{ in_array('มีรายงานการตรวจสอบความปลอดภัยระบบไฟฟ้าประจำปี', explode(',',$task->checklist)) ? 'checked' : ''}} id="">
                            @endif                        
                            <label class="text-slate-500" for="">มีรายงานการตรวจสอบความปลอดภัยระบบไฟฟ้าประจำปี</label>
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        @if ($user->duty === "eletricalEngineer")
                        <div class="mb-6">
                            <input                                  
                            type="checkbox" name="duty[]" value="มีแบบแปลนที่แสดงการติดตั้งระบบไฟฟ้าในโรงงานที่มีวิศวกรไฟฟ้ารับรอง" {{ in_array('มีแบบแปลนที่แสดงการติดตั้งระบบไฟฟ้าในโรงงานที่มีวิศวกรไฟฟ้ารับรอง', explode(',',$task->checklist)) ? 'checked' : ''}} id="">   
                            <label for="">มีมีแบบแปลนที่แสดงการติดตั้งระบบไฟฟ้าในโรงงานที่มีวิศวกรไฟฟ้ารับรอง</label>
                            @else
                            <input                                  
                             type="checkbox" disabled name="duty[]" value="มีแบบแปลนที่แสดงการติดตั้งระบบไฟฟ้าในโรงงานที่มีวิศวกรไฟฟ้ารับรอง" {{ in_array('มีแบบแปลนที่แสดงการติดตั้งระบบไฟฟ้าในโรงงานที่มีวิศวกรไฟฟ้ารับรอง', explode(',',$task->checklist)) ? 'checked' : ''}} id="">
                             <label  class="text-slate-500" for="">มีแบบแปลนที่แสดงการติดตั้งระบบไฟฟ้าในโรงงานที่มีวิศวกรไฟฟ้ารับรอง</label>
                            @endif                                                        
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="mb-6">
                            <input type="checkbox" name="duty[]" value="มีแบบแปลนที่แสดงการติดตั้งระบบไฟฟ้าในโรงงานที่มีวิศวกรไฟฟ้ารับรอง
                            " id="" {{ in_array('มีแบบแปลนที่แสดงการติดตั้งระบบไฟฟ้าในโรงงานที่มีวิศวกรไฟฟ้ารับรอง', explode(',',$task->checklist)) ? 'checked' : ''}}>
                            <label for="">มีแบบแปลนที่แสดงการติดตั้งระบบไฟฟ้าในโรงงานที่มีวิศวกรไฟฟ้ารับรอง
                            </label>
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        @if ($user->duty === "eletricalEngineer")
                        <div class="mb-6">
                            <input                                  
                            type="checkbox" name="duty[]" value="มีการต่อสายดิน สภาพไม่ชำรุด" {{ in_array('มีการต่อสายดิน สภาพไม่ชำรุด', explode(',',$task->checklist)) ? 'checked' : ''}} id="">   
                            <label for="">มีการต่อสายดิน สภาพไม่ชำรุด</label>
                            @else
                            <input                                  
                             type="checkbox" disabled name="duty[]" value="มีการต่อสายดิน สภาพไม่ชำรุด" {{ in_array('มีการต่อสายดิน สภาพไม่ชำรุด', explode(',',$task->checklist)) ? 'checked' : ''}} id="">
                             <label  class="text-slate-500" for="">มีการต่อสายดิน สภาพไม่ชำรุด</label>
                            @endif                                                        
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- <div class="mb-6">
                            <input type="checkbox" name="duty[]" value="มีการต่อสายดิน สภาพไม่ชำรุด
                            " id="" {{ in_array('มีการต่อสายดิน สภาพไม่ชำรุด', explode(',',$task->checklist)) ? 'checked' : ''}}>
                            <label for="">มีการต่อสายดิน สภาพไม่ชำรุด
                            </label>
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div> --}}

                        @if ($user->duty === "eletricalEngineer")
                        <div class="mb-6">
                            <input                                  
                            type="checkbox" name="duty[]" value="อุปกรณ์หมอแปลงอยู่ในสภาพโล่ง โดยรอบ" {{ in_array('อุปกรณ์หมอแปลงอยู่ในสภาพโล่ง โดยรอบ', explode(',',$task->checklist)) ? 'checked' : ''}} id="">   
                            <label for="">อุปกรณ์หมอแปลงอยู่ในสภาพโล่ง โดยรอบ</label>
                            @else
                            <input                                  
                             type="checkbox" disabled name="duty[]" value="อุปกรณ์หมอแปลงอยู่ในสภาพโล่ง โดยรอบ" {{ in_array('อุปกรณ์หมอแปลงอยู่ในสภาพโล่ง โดยรอบ', explode(',',$task->checklist)) ? 'checked' : ''}} id="">
                             <label  class="text-slate-500" for="">อุปกรณ์หมอแปลงอยู่ในสภาพโล่ง โดยรอบ</label>
                            @endif                                                        
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        
                         {{-- <div class="mb-6">
                            <input type="checkbox" name="duty[]" value="อุปกรณ์หมอแปลงอยู่ในสภาพโล่ง โดยรอบ" id="" {{ in_array('อุปกรณ์หมอแปลงอยู่ในสภาพโล่ง โดยรอบ', explode(',',$task->checklist)) ? 'checked' : ''}}>
                            <label for="">อุปกรณ์หมอแปลงอยู่ในสภาพโล่ง โดยรอบ
                            </label>
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror --}}
                            <div class="mt-2">
                            <h1 class="text-3xl">เคมี</h1>
                        </div> 
                            <br />
                            <div class="mb-6">
                            @if ($user->duty === "chemicalEngineer")
                            <input                                  
                            type="checkbox" name="duty[]" value="มีอุปกรณ์ความปลอดภัยที่เหมาะสมเพียงพอในบริเวณการเก็บสายเคมี" {{ in_array('มีอุปกรณ์ความปลอดภัยที่เหมาะสมเพียงพอในบริเวณการเก็บสายเคมี', explode(',',$task->checklist)) ? 'checked' : ''}} id="">   
                            <label for="">มีอุปกรณ์ความปลอดภัยที่เหมาะสมเพียงพอในบริเวณการเก็บสายเคมี</label>
                            @else
                            <input                                  
                             type="checkbox" disabled name="duty[]" value="มีอุปกรณ์ความปลอดภัยที่เหมาะสมเพียงพอในบริเวณการเก็บสายเคมี" {{ in_array('มีอุปกรณ์ความปลอดภัยที่เหมาะสมเพียงพอในบริเวณการเก็บสายเคมี', explode(',',$task->checklist)) ? 'checked' : ''}} id="">
                             <label  class="text-slate-500" for="">มีอุปกรณ์ความปลอดภัยที่เหมาะสมเพียงพอในบริเวณการเก็บสายเคมี</label>
                            @endif                                                        
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="mb-6">
                                @if ($user->duty === "chemicalEngineer")
                                <input                                  
                                type="checkbox" name="duty[]" value="มีป้ายแสดงตำแหน่งการติดตั้งอุปกรณ์ความปลอดภัย" {{ in_array('มีป้ายแสดงตำแหน่งการติดตั้งอุปกรณ์ความปลอดภัย', explode(',',$task->checklist)) ? 'checked' : ''}} id="">   
                                <label for="">มีป้ายแสดงตำแหน่งการติดตั้งอุปกรณ์ความปลอดภัย</label>
                                @else
                                <input                                  
                                 type="checkbox" disabled name="duty[]" value="มีป้ายแสดงตำแหน่งการติดตั้งอุปกรณ์ความปลอดภัย" {{ in_array('มีป้ายแสดงตำแหน่งการติดตั้งอุปกรณ์ความปลอดภัย', explode(',',$task->checklist)) ? 'checked' : ''}} id="">
                                 <label  class="text-slate-500" for="">มีป้ายแสดงตำแหน่งการติดตั้งอุปกรณ์ความปลอดภัย</label>
                                @endif                                                        
                                @error('duty[]')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="mb-6">
                                    @if ($user->duty === "chemicalEngineer")
                                    <input                                  
                                    type="checkbox" name="duty[]" value="มีขั้นตอนการปฏิบัติงานอย่างปลอดภัยทุกกิจกรรมที่เกี่ยวข้องกับสารเคมีอันตราย" {{ in_array('มีขั้นตอนการปฏิบัติงานอย่างปลอดภัยทุกกิจกรรมที่เกี่ยวข้องกับสารเคมีอันตราย', explode(',',$task->checklist)) ? 'checked' : ''}} id="">   
                                    <label for="">มีขั้นตอนการปฏิบัติงานอย่างปลอดภัยทุกกิจกรรมที่เกี่ยวข้องกับสารเคมีอันตราย</label>
                                    @else
                                    <input                                  
                                     type="checkbox" disabled name="duty[]" value="มีขั้นตอนการปฏิบัติงานอย่างปลอดภัยทุกกิจกรรมที่เกี่ยวข้องกับสารเคมีอันตราย" {{ in_array('มีขั้นตอนการปฏิบัติงานอย่างปลอดภัยทุกกิจกรรมที่เกี่ยวข้องกับสารเคมีอันตราย', explode(',',$task->checklist)) ? 'checked' : ''}} id="">
                                     <label  class="text-slate-500" for="">มีขั้นตอนการปฏิบัติงานอย่างปลอดภัยทุกกิจกรรมที่เกี่ยวข้องกับสารเคมีอันตราย</label>
                                    @endif                                                        
                                    @error('duty[]')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                    @enderror
                                    </div>
                            
                            {{-- <div class="mb-6">
                                <input type="checkbox" name="duty[]" value="มีอุปกรณ์ความปลอดภัยที่เหมาะสมเพียงพอในบริเวณการเก็บสายเคมี" id="" {{ in_array('มีอุปกรณ์ความปลอดภัยที่เหมาะสมเพียงพอในบริเวณการเก็บสายเคมี', explode(',',$task->checklist)) ? 'checked' : ''}}>
                                <label for="">มีอุปกรณ์ความปลอดภัยที่เหมาะสมเพียงพอในบริเวณการเก็บสายเคมี

                                </label>
                                @error('duty[]')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror --}}
                                <div class="mb-">
                                    @if ($user->duty === "chemicalEngineer")
                                    <input                                  
                                    type="checkbox" name="duty[]" value="มีที่อาบน้ำ และล้างตาฉุกเฉินใกล้กับบริเวณปฏิบัติงานที่เกี่ยวข้องกับสารเคมีและต้องอยู่ในสภาพที่ดี" {{ in_array('มีที่อาบน้ำ และล้างตาฉุกเฉินใกล้กับบริเวณปฏิบัติงานที่เกี่ยวข้องกับสารเคมีและต้องอยู่ในสภาพที่ดี', explode(',',$task->checklist)) ? 'checked' : ''}} id="">   
                                    <label for="">มีที่อาบน้ำ และล้างตาฉุกเฉินใกล้กับบริเวณปฏิบัติงานที่เกี่ยวข้องกับสารเคมีและต้องอยู่ในสภาพที่ดี</label>
                                    @else
                                    <input                                  
                                     type="checkbox" disabled name="duty[]" value="มีที่อาบน้ำ และล้างตาฉุกเฉินใกล้กับบริเวณปฏิบัติงานที่เกี่ยวข้องกับสารเคมีและต้องอยู่ในสภาพที่ดี" {{ in_array('มีที่อาบน้ำ และล้างตาฉุกเฉินใกล้กับบริเวณปฏิบัติงานที่เกี่ยวข้องกับสารเคมีและต้องอยู่ในสภาพที่ดี', explode(',',$task->checklist)) ? 'checked' : ''}} id="">
                                     <label  class="text-slate-500" for="">มีที่อาบน้ำ และล้างตาฉุกเฉินใกล้กับบริเวณปฏิบัติงานที่เกี่ยวข้องกับสารเคมีและต้องอยู่ในสภาพที่ดี</label>
                                    @endif                                                        
                                    @error('duty[]')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="items-center justify-start text-center mt-4">
                                        
                                    <button class="inline-flex p-4 text-xl font-semibold leading-5 text-white bg-black rounded-full hover:bg-slate-800 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300  py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                        ยืนยันการแก้ไขฟอร์ม
                                    </button>
                                    
                                </div>
                                </div>
                                {{-- <div class="mb-6 mt-6">
                                    <input type="checkbox" name="duty[]" value="มีป้ายแสดงตำแหน่งการติดตั้งอุปกรณ์ความปลอดภัย" id="" {{ in_array('มีป้ายแสดงตำแหน่งการติดตั้งอุปกรณ์ความปลอดภัย', explode(',',$task->checklist)) ? 'checked' : ''}}>
                                    <label for="">มีป้ายแสดงตำแหน่งการติดตั้งอุปกรณ์ความปลอดภัย
                                    </label>
                                    @error('duty[]')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                    @enderror --}}
                                   

                                    {{-- <div class="mb-6 mt-6">
                                        <input type="checkbox" name="duty[]" value="มีขั้นตอนการปฏิบัติงานอย่างปลอดภัยทุกกิจกรรมที่เกี่ยวข้องกับสารเคมีอันตราย" id="" {{ in_array('มีขั้นตอนการปฏิบัติงานอย่างปลอดภัยทุกกิจกรรมที่เกี่ยวข้องกับสารเคมีอันตราย', explode(',',$task->checklist)) ? 'checked' : ''}}>
                                        <label for="">มีขั้นตอนการปฏิบัติงานอย่างปลอดภัยทุกกิจกรรมที่เกี่ยวข้องกับสารเคมีอันตราย
                                        </label>
                                        @error('duty[]')
                                        <div class="text-sm text-red-600">{{ $message }}</div>
                                        @enderror --}}


                                      
                                        {{-- <div class="mb-6 mt-6">
                                            <input type="checkbox" name="duty[]" value="มีที่อาบน้ำ และล้างตาฉุกเฉินใกล้กับบริเวณปฏิบัติงานที่เกี่ยวข้องกับสารเคมีและต้องอยู่ในสภาพที่ดี" id="" {{ in_array('มีที่อาบน้ำ และล้างตาฉุกเฉินใกล้กับบริเวณปฏิบัติงานที่เกี่ยวข้องกับสารเคมีและต้องอยู่ในสภาพที่ดี', explode(',',$task->checklist)) ? 'checked' : ''}}>
                                            <label for="">มีที่อาบน้ำ และล้างตาฉุกเฉินใกล้กับบริเวณปฏิบัติงานที่เกี่ยวข้องกับสารเคมีและต้องอยู่ในสภาพที่ดี
                                            </label>
                                            @error('duty[]')
                                            <div class="text-sm text-red-600">{{ $message }}</div>
                                            @enderror --}}
                                                                                                                                                             
                    </form>
                
                </div>
            </div>
        </div>
    </div>
@endsection
