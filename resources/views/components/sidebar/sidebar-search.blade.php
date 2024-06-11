<div x-cloak x-show="search" x-on:click="search=false"
    class="z-50 fixed inset-0 min-w-screen min-h-screen flex justify-center items-center bg-black bg-opacity-50">
    <div @click.stop
        class="z-50 bg-white max-w-3xl w-full max-h-96 h-full m-auto flex flex-col py-4 rounded-lg text-black">
        {{-- Search Bar --}}
        <div class="w-full flex items-center px-4 mb-3">
            <i class="fa-solid fa-magnifying-glass fa-lg mr-2 text-gray-500"></i>
            <label>
                <input class="w-full text-black text-xl outline-none border-none ring-0" type="text"
                    placeholder="Search in Your Notion...">
            </label>
        </div>
        {{-- List of all workspace --}}
        <div class="w-full border-t border-gray-300 px-2 py-4 box-border overflow-y-auto">
            @foreach($workspace->teamspaces as $team)

                @can('teamspace-view', [$workspace, $team])
                    <div class="pl-4 mb-4">
                        <h1 class="text-gray-500 font-bold opacity-70">{{ $team->name }}</h1>

                        @foreach($team->notes as $note)
                            <a href=""
                               class="w-full pl-4 py-2  flex items-center flex-shrink-0 flex-grow rounded-md hover:bg-stone-200 hover:cursor-pointer transition-all duration-300">
                                <i class="fa-regular fa-file-zipper fa-lg mr-2"></i>
                                <div class="flex items-center flex-1 text-nowrap text-clip overflow-hidden">
                                    <div class="text-ellipsis text-sm font-medium whitespace-nowrap overflow-hidden">
                                        {{$note->title}}
                                    </div>
                                </div>
                            </a>

                        @endforeach
                    </div>
                @endcan
            @endforeach
        </div>
    </div>
</div>
