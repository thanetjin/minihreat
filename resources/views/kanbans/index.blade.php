@extends('layouts.main')

@section('content')

@php use Carbon\Carbon; @endphp

<h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
    {{ __('โรงงานที่ตรวจสอบ : ') }} "{{$event->name}}"
</h2>
@if (Auth::user()->role === "staff")
    <div>
    <a class="inline-flex p-4 text-xl font-semibold leading-5 text-green-800 bg-green-100 rounded-full hover:bg-green-900 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300  py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" href="{{ route('kanbans.create', ['event' => $event]) }}">สร้างฟอร์ม</a>
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
    <div class="border-black border-b-4 w-full rounded-xl my-5"></div>
    <div class="relative overflow-x-auto rounded-xl">
        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ตำแหน่ง
                    </th>    
                    <th scope="col" class="px-6 py-3">
                        คำอธิบาย
                    </th>
                                                        
                    <th scope="col" class="px-6 py-3">
                        เวลาในการอัพเดทฟอร์มล่าสุด
                    </th>
                    
                </tr>
            </thead>
            <tbody>                
                @foreach($event->tasks as $task)
                
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{$task->id}}
                    </th>
                    <td class="px-6 py-4">
                        @if ($task->role === "fireman")
                        นักอัคคีภัย
                        @elseif ($task->role === "chemicalEngineer")
                        วิศวกรเคมี                        
                        @elseif ($task->role === "eletricalEngineer")
                        วิศวกรไฟฟ้า
                        @endif                        
                    </td>
                    
                    <td class="px-6 py-4 text-red-500">
                        {{$task->desc}}
                    </td>

                    
                    
                    <td class="px-6 py-4">
                        {{Carbon::parse($task->updated_at)->format('g:i a l jS F, Y')}}
                    </td>
                    <td>
                        {{-- <form method="POST" action="{{ route('kanbans.change',['task' => $task->id]) }}">
                            @csrf
                            @method("PUT")
                            <h1>{{$task->id}}</h1>
                            <button>Edit</button> --}}
                            <td
                        class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">                                                                
                        @if ($user->role === "user")                                                
                        @if ($user->duty === $task->role)                        
                        <a href="{{ route('kanbans.change', ['event' => $event->id,'task' => $task->id])}}">แก้ไขแบบฟอร์ม</a>                    
                        @endif
                        @endif

                        @if ($user->role === "staff")
                        <a href="{{ route('kanbans.change', ['event' => $event->id,'task' => $task->id])}}">แก้ไขแบบฟอร์ม</a>                    
                        @endif
                    </td>
                    </td>
                    
                    {{-- <a href="{{ route('loans.terminate', ['loan' => $loan->id]) }}">คืนเครื่องมือ</a> --}}
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('kanbans.storeLeaderDesc', ['event' => $event]) }}" method="POST">                            
            @csrf

            <div class="mt-5">
                <label for="description" class="block mb-2 text-xl font-medium text-gray-900">คำอธิบายเพิ่มเติมจากหัวหน้าทีม</label>
                
                @if (Auth::user()->role === "staff")
                <textarea name="desc_lead"  id="description"  rows="10" 
                    class="text-xl block p-2.5 w-full  text-red-500 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="กรุณาใส่ข้อมูลเพิ่มเติม"  required>{{ $event->desc_lead }}</textarea>
                        <div class="flex justify-center items-center text-center m-4">
                            <button type="submit"  class="inline-flex p-4 text-xl font-semibold leading-5 text-white bg-black rounded-full hover:bg-slate-800 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300  py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">เพิ่มคำอธิบาย</button>      
                          </div>
                          </form>
                @endif
                @if (Auth::user()->role === "user")
                <div class="  bg-white dark:bg-slate-900 rounded-lg px-6 py-8 ring-1 ring-slate-900/5 shadow-xl">                    
                    <h3 class="text-red-500 dark:text-white  text-base font-medium tracking-tight">{{ $event->desc_lead }}</h3>                    
                  </div>
                @endif                
            </div>
            

        
    </div>
</div>


     

    
    
    
    
    {{-- <form action="{{ route('kanbans.store', ['event' => $event]) }}" method="POST">                            
    @csrf    
    <div class="flex justify-center ">        
    <div class="flex flex-col items-center mb-4">
    <div class="mb-6 mr-4 flex flex-col">
      <input type="text" id="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Tasks.." required> 
      <br>
        <fieldset>
            
            <div class="flex items-center mb-5">
                <input  id="todo" name="type" type="radio" value="todo" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                <label for="todo" name="todo" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                todo
                </label>
            </div>

            <div class="flex items-center mb-5">
                <input id="inProgress" type="radio"   name="type" value="inProgress" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                <label for="inProgress" name="inProgress"  class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                inProgress
                </label>
            </div>

            <div class="flex items-center mb-5">
                <input id="done" type="radio" name="type" value="done" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                <label for="done" name="done" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        done
                </label>
            </div>
        </fieldset>
      <button type="submit"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>      
      
    </div>
</div>
</form> --}}
{{-- </div> --}}
{{--   
    role engineer 
    <h1 class="text-3xl font-bold">Engineer</h1>
    <br> --}}

    {{-- Todo --}}
    {{-- <div class="flex bg-slate-300">
        <div class="items-center m-5 w-full font-bold">
            <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl">
                <div class="flex flex-col justify-between p-4 leading-normal overflow-hidden text-ellipsis">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">Todo</h5>
                    @foreach ($event->tasks as $task)                    
                    @if ($task->type === "todo" && $task->role === "engineer")
                    <div class="shadow bg-gray-200 rounded-lg p-3 mb-3 font-normal text-sm text-gray-700 w-[27vw]">
                        <p class="w-[25vw] mb-4">{{ $task->name }}</p>            
                    <div class="flex w-9/12"> 
                        <form action="{{ route('kanbans.update', ['kanban' => $task]) }}" method="POST">                            
                            @csrf
                            @method('PUT')
                        <button type="submit" name="inProgress" value="inProgress" class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 shadow-lg shadow-pink-500/50 dark:shadow-lg dark:shadow-pink-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 font-bold">I</button>
                        <button type="submit" name="done" value="done" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 font-bold">D</button>                       
                    </form>
                    </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>    
        </div> --}}
            {{-- In-Progrss --}}
        {{-- <div class="items-center m-5 w-full font-bold">
            <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl">
                <div class="flex flex-col justify-between p-4 leading-normal overflow-hidden text-ellipsis">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">In Progress</h5>
                    @foreach ($event->tasks as $task)                    
                    @if ($task->type === "inProgress" && $task->role === "engineer")
                    <div class="shadow bg-gray-200 rounded-lg p-3 mb-3 font-normal text-sm text-gray-700 w-[27vw]">
                        <p class="w-[25vw] mb-4">{{ $task->name }}</p>            
                    <div class="flex w-9/12"> 
                        <form action="{{ route('kanbans.update', ['kanban' => $task]) }}" method="POST">                            
                            @csrf
                            @method('PUT')    
                        <button type="submit" name="todo" value="todo" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 font-bold ">T</button>                        
                        <button type="submit" name="done" value="done" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 font-bold">D</button>                       
                    </form>
                    </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>    
        </div> --}}
        
        {{-- Done --}}
        {{-- <div class="items-center m-5 w-full font-bold">
            <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl">
                <div class="flex flex-col justify-between p-4 leading-normal overflow-hidden text-ellipsis">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">Done</h5>
                    @foreach ($event->tasks as $task )                    
                    @if ($task->type === "done" && $task->role === "engineer")
                    <div class="shadow bg-gray-200 rounded-lg p-3 mb-3 font-normal text-sm text-gray-700 w-[27vw]">
                        <p class="w-[25vw] mb-4">{{ $task->name }}</p>            
                    <div class="flex w-9/12"> 
                        <form action="{{ route('kanbans.update', ['kanban' => $task]) }}" method="POST">                            
                            @csrf
                            @method('PUT')
                        <button type="submit" name="todo" value="todo" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 font-bold ">T</button>
                        <button type="submit" name="inProgress" value="inProgress" class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 shadow-lg shadow-pink-500/50 dark:shadow-lg dark:shadow-pink-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 font-bold">I</button>                        
                    </form>
                    </div>                
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>    
        </div>  --}}
 
    {{-- </div> --}}

    {{-- role   --}}
    {{-- <div class="mt-4">
    <h1 class="text-3xl ">Firefighter</h1>
    <br>
</div> --}}

    {{-- Todo --}}
    {{-- <div class="flex bg-slate-300">
        <div class="items-center m-5 w-full font-bold">
            <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl">
                <div class="flex flex-col justify-between p-4 leading-normal overflow-hidden text-ellipsis">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">Todo</h5>
                    @foreach ($event->tasks as $task)                    
                    @if ($task->type === "todo" && $task->role === "firefighter")
                    <div class="shadow bg-gray-200 rounded-lg p-3 mb-3 font-normal text-sm text-gray-700 w-[27vw]">
                        <p class="w-[25vw] mb-4">{{ $task->name }}</p>            
                    <div class="flex w-9/12"> 
                        <form action="{{ route('kanbans.update', ['kanban' => $task]) }}" method="POST">                            
                            @csrf
                            @method('PUT')
                        <button type="submit" name="inProgress" value="inProgress" class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 shadow-lg shadow-pink-500/50 dark:shadow-lg dark:shadow-pink-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 font-bold">I</button>
                        <button type="submit" name="done" value="done" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 font-bold">D</button>                       
                    </form>
                    </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>    
        </div> --}}
            {{-- In-Progrss --}}
        {{-- <div class="items-center m-5 w-full font-bold">
            <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl">
                <div class="flex flex-col justify-between p-4 leading-normal overflow-hidden text-ellipsis">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">In Progress</h5>
                    @foreach ($event->tasks as $task)                    
                    @if ($task->type === "inProgress" && $task->role === "firefighter")
                    <div class="shadow bg-gray-200 rounded-lg p-3 mb-3 font-normal text-sm text-gray-700 w-[27vw]">
                        <p class="w-[25vw] mb-4">{{ $task->name }}</p>            
                    <div class="flex w-9/12"> 
                        <form action="{{ route('kanbans.update', ['kanban' => $task]) }}" method="POST">                            
                            @csrf
                            @method('PUT')    
                        <button type="submit" name="todo" value="todo" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 font-bold ">T</button>                        
                        <button type="submit" name="done" value="done" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 font-bold">D</button>                       
                    </form>
                    </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>    
        </div> --}}
        
        {{-- Done --}}
        {{-- <div class="items-center m-5 w-full font-bold">
            <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl">
                <div class="flex flex-col justify-between p-4 leading-normal overflow-hidden text-ellipsis">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">Done</h5>
                    @foreach ($event->tasks as $task)                    
                    @if ($task->type === "done" && $task->role === "firefighter")
                    <div class="shadow bg-gray-200 rounded-lg p-3 mb-3 font-normal text-sm text-gray-700 w-[27vw]">
                        <p class="w-[25vw] mb-4">{{ $task->name }}</p>            
                    <div class="flex w-9/12"> 
                        <form action="{{ route('kanbans.update', ['kanban' => $task]) }}" method="POST">                            
                            @csrf
                            @method('PUT')
                        <button type="submit" name="todo" value="todo" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 font-bold ">T</button>
                        <button type="submit" name="inProgress" value="inProgress" class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 shadow-lg shadow-pink-500/50 dark:shadow-lg dark:shadow-pink-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 font-bold">I</button>                        
                    </form>
                    </div>                
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>    
        </div> 
 
    </div> --}}

    {{-- role scientist  --}}
    {{-- <div class="mt-4">
        <h1 class="text-3xl ">Scientist</h1>
        <br>
    </div> --}}

    {{-- Todo --}}
    {{-- <div class="flex bg-slate-300">
        <div class="items-center m-5 w-full font-bold">
            <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl">
                <div class="flex flex-col justify-between p-4 leading-normal overflow-hidden text-ellipsis">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">Todo</h5>
                    @foreach ($event->tasks as $task)                    
                    @if ($task->type === "todo" && $task->role === "scientist")
                    <div class="shadow bg-gray-200 rounded-lg p-3 mb-3 font-normal text-sm text-gray-700 w-[27vw]">
                        <p class="w-[25vw] mb-4">{{ $task->name }}</p>            
                    <div class="flex w-9/12"> 
                        <form action="{{ route('kanbans.update', ['kanban' => $task]) }}" method="POST">                            
                            @csrf
                            @method('PUT')
                        <button type="submit" name="inProgress" value="inProgress" class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 shadow-lg shadow-pink-500/50 dark:shadow-lg dark:shadow-pink-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 font-bold">I</button>
                        <button type="submit" name="done" value="done" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 font-bold">D</button>                       
                    </form>
                    </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>    
        </div> --}}
            {{-- In-Progrss --}}
        {{-- <div class="items-center m-5 w-full font-bold">
            <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl">
                <div class="flex flex-col justify-between p-4 leading-normal overflow-hidden text-ellipsis">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">In Progress</h5>
                    @foreach ($event->tasks as $task )                    
                    @if ($task->type === "inProgress" && $task->role === "scientist")
                    <div class="shadow bg-gray-200 rounded-lg p-3 mb-3 font-normal text-sm text-gray-700 w-[27vw]">
                        <p class="w-[25vw] mb-4">{{ $task->name }}</p>            
                    <div class="flex w-9/12"> 
                        <form action="{{ route('kanbans.update', ['kanban' => $task]) }}" method="POST">                            
                            @csrf
                            @method('PUT')    
                        <button type="submit" name="todo" value="todo" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 font-bold ">T</button>                        
                        <button type="submit" name="done" value="done" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 font-bold">D</button>                       
                    </form>
                    </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>    
        </div> --}}
        
        {{-- Done --}}
        {{-- <div class="items-center m-5 w-full font-bold">
            <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl">
                <div class="flex flex-col justify-between p-4 leading-normal overflow-hidden text-ellipsis">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">Done</h5>
                    @foreach ($event->tasks as $task)                    
                    @if ($task->type === "done" && $task->role === "scientist")
                    <div class="shadow bg-gray-200 rounded-lg p-3 mb-3 font-normal text-sm text-gray-700 w-[27vw]">
                        <p class="w-[25vw] mb-4">{{ $task->name }}</p>            
                    <div class="flex w-9/12"> 
                        <form action="{{ route('kanbans.update', ['kanban' => $task]) }}" method="POST">                            
                            @csrf
                            @method('PUT')
                        <button type="submit" name="todo" value="todo" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 font-bold ">T</button>
                        <button type="submit" name="inProgress" value="inProgress" class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 shadow-lg shadow-pink-500/50 dark:shadow-lg dark:shadow-pink-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 font-bold">I</button>                        
                    </form>
                    </div>                
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>    
        </div> 
 
    </div> --}}

    {{-- Testing member count --}}
                
        

    {{-- member --}}
    <div class="border-black border-b-4 w-full rounded-xl my-5"></div>
    <div class="relative overflow-x-auto rounded-xl">
        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ชื่อผู้ใช้งาน
                    </th>
                    <th scope="col" class="px-6 py-3">
                        อีเมล
                    </th>
                    <th scope="col" class="px-6 py-3">
                        หน้าที่
                    </th>
                    <th scope="col" class="px-6 py-3">
                        สถานะในการทำงาน
                    </th>
                </tr>
            </thead>
            <tbody>                
                
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{$owner->name}}
                    </th>
                    
                    <td class="px-6 py-4">
                        {{$owner->email}}
                    </td>
                    <td class="px-6 py-4">
                        @if ($owner->duty === "fireman")
                        นักอัคคีภัย
                        @elseif ($owner->duty === "chemicalEngineer")
                        วิศวกรเคมี                        
                        @elseif ($owner->duty === "eletricalEngineer")
                        วิศวกรไฟฟ้า
                        @endif
                        {{-- {{$member->duty}} --}}
                    </td>
                    <td class="px-6 py-4">
                        @if($owner->is_available == false)                       
                        <span
                            class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                            ว่าง
                            </span>                        
                        @endif
                        @if($owner->is_available == true)                       
                        <span
                            class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                               ไม่ว่าง
                            </span>
                        @endif
                    </td>                    
                </tr>

                @foreach($event->users as $member)
                
                
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{$member->name}}
                    </th>
                    
                    <td class="px-6 py-4">
                        {{$member->email}}
                    </td>
                    <td class="px-6 py-4">
                        @if ($member->duty === "fireman")
                        นักอัคคีภัย
                        @elseif ($member->duty === "chemicalEngineer")
                        วิศวกรเคมี                        
                        @elseif ($member->duty === "eletricalEngineer")
                        วิศวกรไฟฟ้า
                        @endif
                        {{-- {{$member->duty}} --}}
                    </td>
                    <td class="px-6 py-4">
                        @if($member->is_available == false)                       
                        <span
                            class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                            ว่าง
                            </span>                        
                        @endif
                        @if($member->is_available == true)                       
                        <span
                            class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                               ไม่ว่าง
                            </span>
                        @endif
                    </td>                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    {{-- <form action="{{ route('kanbans.store', ['event' => $event]) }}" method="POST">                             --}}
        @if (Auth::user()->role === "staff")
    <form action="{{ route('kanbans.changeStatus', ['event' => $event]) }}" method="POST">                            
        @csrf
        <div class="flex justify-center items-center text-center m-4">
      <button type="submit"  class="inline-flex p-4 text-xl font-semibold leading-5 text-white bg-black rounded-full hover:bg-slate-800 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300  py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">ตรวจโรงงานสำเร็จ</button>      
    </div>
    </form>
    @endif
@endsection