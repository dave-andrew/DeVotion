<div class="relative w-60 h-full min-h-screen flex flex-col bg-stone-100" x-data="{ search: false }">
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
        <a class="group sidebar-row my-1 text-sm font-semibold">
            <i class="fa-solid fa-gear fa-md mr-2 text-gray-400"></i>
            <div>Settings & Members</div>
        </a>


        {{-- Workspace --}}
        <div class="flex flex-col text-gray-400 font-semibold">
            <div class="sidebar-row mt-2 text-sm">
                <h1>Workspace</h1>
                <div class="ml-auto">
                    <button class="w-5 h-5 mr-1 rounded-sm hover:bg-stone-300 ">
                        <i class="fa-solid fa-plus fa-sm"></i>
                    </button>
                </div>
            </div>
            <a class="group sidebar-row my-1">
                <i class="fa-regular fa-file-zipper fa-lg mr-2"></i>
                <div class="flex items-center flex-1 text-nowrap text-clip overflow-hidden">
                    <div class="text-ellipsis text-sm font-medium whitespace-nowrap overflow-hidden">Workspace Number
                        One</div>
                </div>
                <object data="" type="">
                    <div class="ml-auto text-sm">
                        <a href="/"
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
                <div class="ml-auto">
                    <button class="w-5 h-5 mr-1 rounded-sm hover:bg-stone-300 ">
                        <i class="fa-solid fa-plus fa-sm"></i>
                    </button>
                </div>
            </div>
            <a class="group sidebar-row my-1">
                <i class="fa-regular fa-file-zipper fa-lg mr-2"></i>
                <div class="flex items-center flex-1 text-nowrap text-clip overflow-hidden">
                    <div class="text-ellipsis text-sm font-medium whitespace-nowrap overflow-hidden">Workspace Number
                        One</div>
                </div>
                <object data="" type="">
                    <div class="ml-auto text-sm">
                        <a href="/"
                            class="group-hover:flex hidden justify-center items-center w-5 h-5 mr-1 rounded-sm hover:bg-stone-300 ">
                            <i class="fa-solid fa-plus fa-sm"></i>
                        </a>
                    </div>
                </object>
            </a>
        </div>
    </div>
    @include('components.sidebar.sidebar-search')
</div>
