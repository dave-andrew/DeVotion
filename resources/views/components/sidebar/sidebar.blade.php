<div class="relative w-60 h-full min-h-screen flex flex-col bg-stone-100" x-data="{ search: false, setting: true }">
    <div class="relative h-full max-h-full flex flex-col ">
        {{-- Profile --}}
        <div class="h-8 sidebar-row my-2">
            <button class="w-full flex items-center  capitalize text-sm font-medium">
                {{ Auth::user()->username }}'s Notion
                <i class="fa-solid fa-chevron-down ml-2"></i>
            </button>
            <a href="/create" class="mr-1"><i class="fa-regular fa-pen-to-square"></i></a>
        </div>
        {{-- Search --}}
        <button x-on:click="search=true" class="group sidebar-row my-1 text-sm font-semibold">
            <i class="fa-solid fa-magnifying-glass fa-md mr-2 text-gray-400"></i>
            <div>Search</div>
        </button>

        {{-- Settings & Members --}}
        <button x-on:click="setting=true" class="group sidebar-row my-1 text-sm font-semibold">
            <i class="fa-solid fa-gear fa-md mr-2 text-gray-400"></i>
            <div>Settings & Members</div>
        </button>


        {{-- Workspace --}}
        <div class="flex flex-col text-gray-400 font-semibold">
            <div class="sidebar-row mt-2 text-sm">
                <h1>Workspace</h1>
                <div class="ml-auto">
                    <button class="w-5 h-5 mr-1 rounded-sm hover:bg-stone-300 ">
                        <i class="fa-solid fa-plus fa-sm"></i>
                    </button>
                    <dialog open class="flex flex-col top-10 left-10 w-[20rem] rounded-lg px-4 py-2 dark:bg-gray-600 dark:text-white shadow-lg">
                        <div class="flex justify-between items-center">
                            <div class="p-2">{{Auth::user()->email}}</div>
                            <div class="flex items-center justify-center h-[1rem] hover:bg-gray-200 py-3 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="30px" height="30px" viewBox="0 0 24 24">
                                    <circle cx="17.5" cy="12" r="1.5"/>
                                    <circle cx="12" cy="12" r="1.5"/>
                                    <circle cx="6.5" cy="12" r="1.5"/>
                                </svg>
                            </div>
                        </div>
                        <hr />
                        <div class="flex-col">
                            @foreach(Auth::user()->workspaces as $workspace)
                                <a href="/workspace/{{$workspace->id}}"
                                   class="flex items-center justify-between w-full h-8 text-sm hover:bg-stone-300 dark:hover:bg-gray-600 dark:hover:text-white">
                                    <div class="p-2">{{$workspace->name}}</div>
                                    <div class="p-2">
                                        <i class="fa-solid fa-chevron-right fa-sm"></i>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </dialog>
                </div>
            </div>
            <a class="group sidebar-row my-1">
                <i class="fa-regular fa-file-zipper fa-lg mr-2"></i>
                <div class="flex items-center flex-1 text-nowrap text-clip overflow-hidden">
                    <div class="text-ellipsis text-sm font-medium whitespace-nowrap overflow-hidden">Workspace Number
                        One
                    </div>
                </div>
                <object data="" type="">
                    <div class="ml-auto text-sm flex items-center">
                        <button
                            class="group-hover:flex hidden justify-center items-center w-5 h-5 mr-1 rounded-sm hover:bg-stone-300 ">
                            <i class="fa-solid fa-ellipsis fa-sm"></i>
                        </button>
                        <a href="/create"
                           class="group-hover:flex hidden justify-center items-center w-5 h-5 mr-1 rounded-sm hover:bg-stone-300 ">
                            <i class="fa-solid fa-plus fa-sm"></i>
                        </a>
                    </div>
                </object>
            </a>
        </div>
        {{-- Private --}}
        <div class="flex flex-col text-gray-400 font-semibold">
            <div class="sidebar-row mt-2 text-sm">
                <h1>Private</h1>
                <div class="relative ml-auto">
                    <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover"
                            class="w-5 h-5 mr-1 rounded-sm hover:bg-stone-300">
                        <i class="fa-solid fa-plus fa-sm"></i>
                    </button>
                    <div id="dropdownHover"
                         class="hidden z-20 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                            <li>
                                <a href="/"
                                   class="flex items-center justify-center w-full h-8 text-sm hover:bg-stone-300 dark:hover:bg-gray-600 dark:hover:text-white">
                                    <i class="fa-solid fa-plus fa-sm mr-2"></i>
                                    <div>Create</div>
                                </a>
                            </li>
                            <li>
                                <a href="/"
                                   class="flex items-center justify-center w-full h-8 text-sm hover:bg-stone-300 dark:hover:bg-gray-600 dark:hover:text-white">
                                    <i class="fa-solid fa-plus fa-sm mr-2"></i>
                                    <div>Create</div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <a class="group sidebar-row my-1">
                <i class="fa-regular fa-file-zipper fa-lg mr-2"></i>
                <div class="flex items-center flex-1 text-nowrap text-clip overflow-hidden">
                    <div class="text-ellipsis text-sm font-medium whitespace-nowrap overflow-hidden">Workspace Number
                        One
                    </div>
                </div>
                <object data="" type="">
                    <div class="ml-auto text-sm">
                        <div class="ml-auto text-sm flex items-center">
                            <button
                                class="group-hover:flex hidden justify-center items-center w-5 h-5 mr-1 rounded-sm hover:bg-stone-300 ">
                                <i class="fa-solid fa-ellipsis fa-sm"></i>
                            </button>
                            <a href="/create"
                               class="group-hover:flex hidden justify-center items-center w-5 h-5 mr-1 rounded-sm hover:bg-stone-300 ">
                                <i class="fa-solid fa-plus fa-sm"></i>
                            </a>
                        </div>
                    </div>
                </object>
            </a>
        </div>
    </div>
    @include('components.sidebar.sidebar-search')
    @include('components.sidebar.sidebar-settings')
</div>
