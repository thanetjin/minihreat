<h1 class="text-3xl">
    Welcome to Laravel!!
    <div>
        
            <h1>{{ $event->event_name }}</h1>
            @foreach ($event->tasks as $task)
                <h1>{{ $task->name }}</h1>
                <h1>{{ $task->type }}</h1>    
            @endforeach
            
        
                
        
    </div>
</h1>
