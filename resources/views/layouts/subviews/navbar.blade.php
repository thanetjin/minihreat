<nav class="bg-white border-gray-200 py-2.5">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
        <div class="flex items-center">
            <img src="{{ URL('images/miniheart.jpg') }}" class="h-6 mr-3 sm:h-9" alt="Logo">
            <a href="/user" class="self-center text-gray-700 text-3xl font-semibold whitespace-nowrap a">Miniheart</a>
        </div>
        @if($user->role === "user")
        <div class="flex items-center lg:order-2">
            <div class="hidden mt-2 mr-4 sm:inline-block">
                <span></span>
            </div>

            <a href="{{ route('user.create') }}" class="flex py-1 px-5 mr-3 mb-2 mt-2 text-sm font-semibold text-black focus:outline-none bg-white rounded-lg border border-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">    
                สร้าง event
                <svg class="w-3 h-3 ml-3 mt-1 text-gray-800" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M20 11H13V4C13 3.73478 12.8946 3.48043 12.7071 3.29289C12.5196 3.10536 12.2652 3 12 3C11.7348 3 11.4804 3.10536 11.2929 3.29289C11.1054 3.48043 11 3.73478 11 4V11H4C3.73478 11 3.48043 11.1054 3.29289 11.2929C3.10536 11.4804 3 11.7348 3 12C3 12.2652 3.10536 12.5196 3.29289 12.7071C3.48043 12.8946 3.73478 13 4 13H11V20C11 20.2652 11.1054 20.5196 11.2929 20.7071C11.4804 20.8946 11.7348 21 12 21C12.2652 21 12.5196 20.8946 12.7071 20.7071C12.8946 20.5196 13 20.2652 13 20V13H20C20.2652 13 20.5196 12.8946 20.7071 12.7071C20.8946 12.5196 21 12.2652 21 12C21 11.7348 20.8946 11.4804 20.7071 11.2929C20.5196 11.1054 20.2652 11 20 11Z" fill="#2F2F38"/>
                </svg>
            </a>
            @endif
            
            

            <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                @if($user->image)
                    <img class="w-10 h-10 rounded-full" src="" alt="user photo">
                @else
                    <img class="w-10 h-10 rounded-full" src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="">
                @endif
            </button>
            
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-fit" id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900"></span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <a href="{{ route('user.show', ['user' => $user ]) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            {{ $user->name }}
                        </a>                        
                    </li>
                    <form action="{{ route('logout' )}}" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                    
                </ul>
            </div>
        </div>
        
    </div>
</nav>