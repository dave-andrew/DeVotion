<div class="relative w-60 h-full min-h-screen flex flex-col bg-stone-100" x-data="{ search: false, setting: false }"
     x-cloak>
    <div class="relative h-full max-h-full flex flex-col">
        {{-- Profile --}}
        <div id="workspaceDialogButton" class="h-8 sidebar-row my-2" onclick="openDialog()">
            <button class="w-full flex items-center capitalize text-sm font-medium">
                {{ Auth::user()->username }}'s Notion
                <i class="fa-solid fa-chevron-down ml-2"></i>
            </button>
            <a href="{{ route('viewCreateWorkspace.type') }}" class="mr-1"><i class="fa-regular fa-pen-to-square"></i></a>
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

        {{-- Teamspace --}}
        <div class="flex flex-col text-gray-400 font-semibold">
            
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
                    <div class="text-ellipsis text-sm font-medium whitespace-nowrap overflow-hidden">
                        Note Number One
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
    <script>

        function openDialog() {
            const dialog = document.getElementById('workspaceDialog');
            dialog.showModal();
        }

        function closeDialog() {
            const dialog = document.getElementById('workspaceDialog');
            dialog.close();
        }

        document.getElementById('workspaceDialogButton').addEventListener('click', openDialog);
        document.getElementById('workspaceDialog').addEventListener('click', closeDialog);

    </script>

</div>
