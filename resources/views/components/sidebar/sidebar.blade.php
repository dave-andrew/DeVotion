@php($counter = 0)

<div class="relative w-60 h-full min-h-screen -z-50 text-2xl"></div>

<div class="fixed left-0 z-40 h-full shadow-md">
    <div class="relative w-60 h-full min-h-screen flex flex-col bg-stone-100"
         x-data="{ search: false, setting: false, teamspace: false, workspace: false, invitations: false }" x-cloak>
        <div class="relative h-full flex flex-col">
            {{-- Profile --}}
            <div class="w-full flex flex-col">
                <div id="workspaceDialogButton" class="h-8 sidebar-row my-2" onclick="openDialog()"
                     x-data="{ userDrop: false }">
                    <button class="w-full flex items-center capitalize text-sm pr-8 font-medium" x-on:click="userDrop=true">
                        <p class="truncate">{{ Auth::user()->username }}'s DeVotion</p>
                        <i class="fa-solid fa-chevron-down ml-2"></i>
                    </button>
                    <a href="{{ route('viewCreateWorkspace.type') }}">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    @include('components.sidebar.sidebar-user-action')
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

                <button x-on:click="invitations=true" class="group sidebar-row my-1 text-sm font-semibold">
                    <i class="fa fa-envelope fa-md mr-2 text-gray-400" aria-hidden="true"></i>
                    <div>Invitations</div>
                </button>

                {{-- Create Teamspace --}}
                @can('teamspace-create', $workspace)
                    <button x-on:click="teamspace=true" class="group sidebar-row my-1 text-sm font-semibold">
                        <i class="fa-solid fa-user-group fa-md mr-2 text-gray-400"></i>
                        <div>Create Teamspace</div>
                    </button>
                @endcan
            </div>


            {{-- Teamspace --}}

            <div class="flex flex-col text-gray-400 font-semibold overflow-y-scroll lean-scrollbar">
                @foreach ($workspace->teamspaces as $team)
                    @cannot('teamspace-view', [$workspace, $team])
                        @continue
                    @endcannot
                    <div class="group sidebar-row flex items-center justify-between mt-2 text-sm">
                        @php($counter++)
                        <h1 onclick="hideNotes({{ $counter }})" class="text-ellipsis overflow-hidden">{{ $team->name }}</h1>
                        @can('teamspace-update', [$workspace, $team])
                            <form action="{{ route('createNote', $workspace->id) }}" method="post" class="group-hover:flex hidden">
                                @csrf
                                <label>
                                    <input name="teamspace_id" value="{{ $team->id }}" hidden/>
                                </label>
                                <label>
                                    <input name="workspace_id" value="{{ $workspace->id }}" hidden/>
                                </label>
                                <button type="submit">
                                    <i class="fa-solid fa-plus fa-sm"></i>
                                </button>
                            </form>
                        @endcan
                    </div>

                    <div id="teamspace-notes-{{ $counter }}">
                        @foreach ($team->notes as $note)
                            <div x-data="{ action: false }" x-cloak>

                                <form action="{{route('viewWorkspaceNote', [$workspace->id, $note->id])}}" method="POST">
                                    @csrf

                                    <label>
                                        <input name="note_id" value="{{$note->id}}" hidden />
                                    </label>
                                    <div>
                                        <div class="relative group sidebar-row my-1 flex items-center">
                                            <i class="fa-regular fa-file-zipper fa-lg mr-2"></i>
                                            <button id="changeNote" class="flex items-center flex-1 text-nowrap text-clip overflow-hidden" type="submit">
                                                <div class="text-ellipsis text-sm font-medium whitespace-nowrap overflow-hidden">
                                                    {{ $note->title }}
                                                </div>
                                            </button>
                                            <div class="ml-auto text-sm flex items-center space-x-1">
                                                <button x-on:mouseenter="action=true" x-on:mouseleave="action=false" id="dialogNote" class="group-hover:flex hidden justify-center items-center w-5 h-5 rounded-sm hover:bg-stone-300">
                                                    <i class="fa-solid fa-ellipsis fa-sm"></i>
                                                </button>
                                                {{--                                        <a href="/create" class="group-hover:flex hidden justify-center items-center w-5 h-5 rounded-sm hover:bg-stone-300">--}}
                                                {{--                                            <i class="fa-solid fa-plus fa-sm"></i>--}}
                                                {{--                                        </a>--}}
                                            </div>
                                        </div>
                                    </div>

                                </form>
                                @include('components.sidebar.sidebar-note-action')
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
        @include('components.sidebar.sidebar-search')
        @include('components.sidebar.sidebar-settings')
        @can('teamspace-create', $workspace)
            @include('components.sidebar.sidebar-teamspace')
        @endcan
        @include('components.sidebar.sidebar-invitations')
        <script>
            function openDialog() {
                const dialog = document.getElementById('workspaceDialog');
                dialog.showModal();
            }

            function closeDialog() {
                const dialog = document.getElementById('workspaceDialog');
                dialog.close();
            }

            function hideNotes(counter) {
                const notes = document.getElementById(`teamspace-notes-${counter}`);
                if (notes.style.display === 'none') notes.style.display = 'block';
                else notes.style.display = 'none';
            }

            document.getElementById('workspaceDialogButton').addEventListener('click', openDialog);
            document.getElementById('workspaceDialog').addEventListener('click', closeDialog);

            document.getElementById('changeNote').stopImmediatePropagation()
            document.getElementById('dialogNote').stopImmediatePropagation()

        </script>

        {{-- create a toast for displaying errors --}}
        @if($errors->any())
            <div id="toast" class="fixed top-4 right-4 bg-red-500 text-white font-bold p-2 rounded-md">
                <div id="toast-body">
                    <div>{{ $errors->first() }}</div>
                </div>
            </div>
        @endif

    </div>

</div>

<style>
    .lean-scrollbar {
        scrollbar-width: thin;
        scrollbar-color: #ccc #f5f5f5;
    }
</style>
