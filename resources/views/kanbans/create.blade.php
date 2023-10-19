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
                        <h1 class="text-3xl">อัคคีภัย</h1>
                        <br />
                        
                        <div class="mb-6">
                            <input type="checkbox" name="duty[]" value="มีอุปกรณ์แจ้งเหตุเพลิงไหม้ครอบคลุมทั่วอาคารโรงงาน" id="">
                            <label for="">มีอุปกรณ์แจ้งเหตุเพลิงไหม้ครอบคลุมทั่วอาคารโรงงาน</label>
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <input type="checkbox" name="duty[]" value="มีน้ำสำรองสำหรับดับเพลิงในปริมาณที่เพียงพอที่จะส่งจ่ายน้ำให้กับอุปกรณ์ได้อย่างต่อเนื่องเป็นเวลาไม่น้อยกว่า 30 นาที" id="">
                            <label for="">มีน้ำสำรองสำหรับดับเพลิงในปริมาณที่เพียงพอที่จะส่งจ่ายน้ำให้กับอุปกรณ์ได้อย่างต่อเนื่องเป็นเวลาไม่น้อยกว่า 30 นาที</label>
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <input type="checkbox" name="duty[]" value="มีระบบน้ำดับเพลิงและระบบดับเพลิงอัตโนมัติ และมีสภาพพร้อมใช้งาน" id="">
                            <label for="">มีระบบน้ำดับเพลิงและระบบดับเพลิงอัตโนมัติ และมีสภาพพร้อมใช้งาน</label>
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <input type="checkbox" name="duty[]" value="มีเส้นทางหนีไฟ" id="">
                            <label for="">มีเส้นทางหนีไฟ</label>
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <h1 class="text-3xl">ไฟฟ้า</h1>
                        <br />
                        
                        <div class="mb-6">
                            <input type="checkbox" name="duty[]" value="มีรายงานการตรวจสอบความปลอดภัยระบบไฟฟ้าประจำปี" id="">
                            <label for="">มีรายงานการตรวจสอบความปลอดภัยระบบไฟฟ้าประจำปี</label>
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <input type="checkbox" name="duty[]" value="มีแบบแปลนที่แสดงการติดตั้งระบบไฟฟ้าในโรงงานที่มีวิศวกรไฟฟ้ารับรอง" id="">
                            <label for="">มีแบบแปลนที่แสดงการติดตั้งระบบไฟฟ้าในโรงงานที่มีวิศวกรไฟฟ้ารับรอง</label>
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <input type="checkbox" name="duty[]" value="มีการต่อสายดิน สภาพไม่ชำรุด" id="">
                            <label for="">มีการต่อสายดิน สภาพไม่ชำรุด</label>
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <input type="checkbox" name="duty[]" value="อุปกรณ์หมอแปลงอยู่ในสภาพโล่ง โดยรอบ" id="">
                            <label for="">อุปกรณ์หมอแปลงอยู่ในสภาพโล่ง โดยรอบ</label>
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <h1 class="text-3xl">เคมี</h1>
                        <br />
                        
                        <div class="mb-6">
                            <input type="checkbox" name="duty[]" value="มีอุปกรณ์ความปลอดภัยที่เหมาะสมเพียงพอในบริเวณการเก็บสายเคมี" id="">
                            <label for="">มีอุปกรณ์ความปลอดภัยที่เหมาะสมเพียงพอในบริเวณการเก็บสายเคมี</label>
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <input type="checkbox" name="duty[]" value="มีป้ายแสดงตำแหน่งการติดตั้งอุปกรณ์ความปลอดภัย" id="">
                            <label for="">มีป้ายแสดงตำแหน่งการติดตั้งอุปกรณ์ความปลอดภัย</label>
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <input type="checkbox" name="duty[]" value="มีขั้นตอนการปฏิบัติงานอย่างปลอดภัยทุกกิจกรรมที่เกี่ยวข้องกับสารเคมีอันตราย" id="">
                            <label for="">มีขั้นตอนการปฏิบัติงานอย่างปลอดภัยทุกกิจกรรมที่เกี่ยวข้องกับสารเคมีอันตราย</label>
                            @error('duty[]')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <input type="checkbox" name="duty[]" value="มีที่อาบน้ำ และล้างตาฉุกเฉินใกล้กับบริเวณปฏิบัติงานที่เกี่ยวข้องกับสารเคมีและต้องอยู่ในสภาพที่ดี" id="">
                            <label for="">มีที่อาบน้ำ และล้างตาฉุกเฉินใกล้กับบริเวณปฏิบัติงานที่เกี่ยวข้องกับสารเคมีและต้องอยู่ในสภาพที่ดี</label>
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
