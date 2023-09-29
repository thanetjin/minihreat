@extends('layouts.main')

@section('content')

    <div class="relative grid mb-10 bg-cover bg-center" id="background">
        <!-- <img src="{{ URL('images/background-user.jpg') }}" 
        class="bg-center h-[30%] w-full"/> -->        
    </div>
    
    
    
    {{-- <form action="{{ route('artists.songs.store', ['artist' => $artist]) }}" method="POST"> --}}
    {{-- <form action="{{ route('artists.songs.store', ['artist' => $artist]) }}" method="POST"> --}}
    {{-- <form action="{{ route('kanbans.update', ['kanban' => $task]) }}" method="POST">--}}                                
    <form action="{{ route('kanbans.store', ['event' => $event]) }}" method="POST">                            
    @csrf
    {{-- <h1>{{ $event }}</h1>
    <h1>{{ $event->id }}</h1> --}}
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
</form>


</div>
  
    {{-- role engineer  --}}
    <h1 class="text-3xl font-bold">Engineer</h1>
    <br>

    {{-- Todo --}}
    <div class="flex bg-slate-300">
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
        </div>
            {{-- In-Progrss --}}
        <div class="items-center m-5 w-full font-bold">
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
        </div>
        
        {{-- Done --}}
        <div class="items-center m-5 w-full font-bold">
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
        </div> 
 
    </div>

    {{-- role   --}}
    <div class="mt-4">
    <h1 class="text-3xl ">Firefighter</h1>
    <br>
</div>

    {{-- Todo --}}
    <div class="flex bg-slate-300">
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
        </div>
            {{-- In-Progrss --}}
        <div class="items-center m-5 w-full font-bold">
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
        </div>
        
        {{-- Done --}}
        <div class="items-center m-5 w-full font-bold">
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
 
    </div>

    {{-- role scientist  --}}
    <div class="mt-4">
        <h1 class="text-3xl ">Scientist</h1>
        <br>
    </div>

    {{-- Todo --}}
    <div class="flex bg-slate-300">
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
        </div>
            {{-- In-Progrss --}}
        <div class="items-center m-5 w-full font-bold">
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
        </div>
        
        {{-- Done --}}
        <div class="items-center m-5 w-full font-bold">
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
 
    </div>

    {{-- Testing member count --}}
                
        

    {{-- member --}}
    <div class="border-black border-b-4 w-full rounded-xl my-5"></div>
    <div class="relative overflow-x-auto rounded-xl">
        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Role
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{Auth::user()->name}}
                    </th>
                    <td class="px-6 py-4">
                        {{Auth::user()->email}}
                    </td>
                    <td class="px-6 py-4">
                        leader
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
                        member
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <form action="{{ route('kanbans.changeStatus', ['event' => $event]) }}" method="POST">                            
        @csrf
        <div class="flex justify-center items-center text-center m-4">
      <button type="submit"  class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Finish</button>      
    </div>
    </form>
@endsection