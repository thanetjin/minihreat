<nav class="bg-white border-gray-200 py-2.5">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
        <div class="flex items-center">
            <img src="{{ URL('images/miniheart.jpg') }}" class="h-6 mr-3 sm:h-9" alt="Logo">
            <span class="self-center text-gray-700 text-3xl font-semibold whitespace-nowrap">Miniheart</span>
        </div>
        <div class="flex items-center lg:order-2">
            <div class="hidden mt-2 mr-4 sm:inline-block">
                <span></span>
            </div>

            <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="" alt="user photo">
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-fit" id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900">name</span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <a href="{{ route('user.show', ['user' => 'Profile']) }}" 
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 text-sm text-red-700 hover:bg-gray-100">Sign out</a>
                    </li>
                </ul>
            </div>

            <!-- <a href="#"
               class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 focus:outline-none">Download</a> -->

            
            
            <!-- <button data-collapse-toggle="mobile-menu-2" type="button"
                    class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="mobile-menu-2" aria-expanded="true">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                          clip-rule="evenodd"></path>
                </svg>
                <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
            </button> -->
        </div>


        <!-- <div class="items-center justify-between w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
            <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                <li>
                    <a href="{{ url('/') }}"
                       class="nav-menu {{ request()->is('/') ? 'active' : '' }}">
                        Welcome
                    </a>
                </li>
                <li>
                    <a href="{{ route('songs.index') }}"
                       class="nav-menu {{ Route::currentRouteName() === 'songs.index' ? 'active' : '' }}">
                        Song Playlist
                    </a>
                </li>
                <li>
                    <a href="{{ route('about.index') }}"
                       class="nav-menu {{ Route::currentRouteName() === 'about.index' ? 'active' : '' }}">
                        About
                    </a>
                </li>
            </ul>
        </div> -->
    </div>
</nav>