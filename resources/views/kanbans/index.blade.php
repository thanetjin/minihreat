@extends('layouts.main')

@section('content')

    <div class="relative grid mb-10 bg-cover bg-center" id="background">
        <!-- <img src="{{ URL('images/background-user.jpg') }}" 
        class="bg-center h-[30%] w-full"/> -->
        
    </div>
    <h2>{{ $event->id }}</h2>
    <h1>gg</h1>
    {{-- <form action="{{ route('artists.songs.store', ['artist' => $artist]) }}" method="POST"> --}}
    {{-- <form action="{{ route('artists.songs.store', ['artist' => $artist]) }}" method="POST"> --}}
    {{-- <form action="{{ route('kanbans.update', ['kanban' => $task]) }}" method="POST">--}}                                
    <form action="{{ route('kanbans.store', ['event' => $event]) }}" method="POST">                            
    @csrf
    
    <div class="flex justify-center ">
        
        
            <div class="flex items-center mb-4">
    <div class="mb-6 mr-4">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Todo</label>
      <input type="text" id="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Tasks.." required> 
      <br>
      <fieldset>
            
        </div>
        
        
            
        
            <form action="{{ route('kanbans.store') }}" method="POST">
        @csrf
        <div class="flex justify-center ">
            
            
                <div class="flex items-center mb-4">
        <div class="mb-6 mr-4">
          <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Todo</label>
          <input type="text" id="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Tasks.." required> 
          <br>
          <fieldset>
                
              
            <div class="flex items-center mb-4">
              <input  id="country-option-1" name="type" type="radio" value="todo" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
              <label for="country-option-1" name="todo" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                todo
              </label>
              <input id="country-option-1" type="radio"   name="type" value="inProgress" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
        
              <label for="country-option-1" name="inProgress"  class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                inProgress
              </label>
              <input id="country-option-1" type="radio" name="type" value="done" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
        <label for="country-option-1" name="done" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                done
              </label>
            </div>
        </fieldset>
          <button type="submit"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
          
        </div>
<<<<<<< HEAD
    </fieldset>
      <button type="submit"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>      
    </div>
</div>
  </form>
</div>
  
    
    {{-- Todo --}}
    <div class="flex bg-slate-300">
        <div class="items-center m-5 w-full font-bold">
            <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl">
                <div class="flex flex-col justify-between p-4 leading-normal overflow-hidden text-ellipsis">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">Todo</h5>
                    @foreach ($event->tasks as $task)
                    @if ($task->type === "todo")
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
                    @if ($task->type === "inProgress")
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
                    @if ($task->type === "done")
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
@endsection
=======
        {{-- <div class="mb-6 mr-4">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">In-progress</label>
            <input type="text" id="email" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Tasks.." required>
        </div> --}}
        {{-- <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Done</label>
            <input type="text" id="email" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Tasks.." required>
            
        </div> --}}
        </div>
        
        </form>
        </div>
        
        {{-- <div class="flex  bg-slate-500 items-center justify-center">
            <div class="bg-green-300 items-center m-5 w-full font-bold">To Do</div>        
            <div class="bg-green-300 items-center m-5 w-full font-bold">In-progress</div>
            <div class="bg-green-300 items-center m-5 w-full font-bold">Done</div>
        </div> --}}
        {{-- @foreach ($tasks as $task)
            
                <div>{{ $task->id }}</div>
                <div>{{ $task->name }}</div>
                <div>{{ $task->type }}</div>
            
            @endforeach --}}
        
        {{-- Todo --}}
        
        
        <div class="flex bg-black ">
            {{-- frist box --}}
            <div class="items-center m-5 w-full font-bold">
                <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl">
                    <div class="flex flex-col justify-between p-4 leading-normal overflow-hidden text-ellipsis">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">Todo</h5>
                        @foreach ($tasks_Todo as $task)
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
                        @endforeach
                    </div>
                </div>    
            </div>
                {{-- In-Progrss --}}
        
            <div class="items-center m-5 w-full font-bold">
                <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl">
                    <div class="flex flex-col justify-between p-4 leading-normal overflow-hidden text-ellipsis">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">In Progress</h5>
                        @foreach ($tasks_Inprocess as $task)
            
                        
                        
                        
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
                        @endforeach
                    </div>
                </div>    
            </div>
            
            {{-- Done --}}
            
            {{-- tasks_Done --}}
            
            <div class="items-center m-5 w-full font-bold">
                <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl">
                    <div class="flex flex-col justify-between p-4 leading-normal overflow-hidden text-ellipsis">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">Done</h5>
                        @foreach ($tasks_Done as $task)
                        
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
                        @endforeach
                    </div>
                </div>    
            </div>  
        </div>
@endsection
>>>>>>> seeder
