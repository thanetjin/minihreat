<h1 class="text-3xl">
    Welcome to Laravel!!
    <div>
        
            <h1>{{ $event->event_name }}</h1>
            @foreach ($event->users as $user)
            <span>{{ $user->name }}</span>
                
            @endforeach
        
    </div>
</h1>
