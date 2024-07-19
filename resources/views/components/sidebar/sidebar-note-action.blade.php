<div x-show="action"
     class="z-50 absolute -right-56 mt-[-10px] w-72 pt-2 bg-white rounded-md shadow-lg text-black text-sm font-normal flex flex-col"
     @click.outside="action = false"
     x-on:mouseenter="action=true"
     x-on:mouseleave="action=false">
    @can('note-create', [$workspace, $team])
        <form action="{{ route('duplicateNote', $workspace->id) }}" method="POST">
            @csrf
            <label>
                <input name="note_id" hidden value="{{$note->id}}"/>
            </label>

            <label>
                <input name="teamspace_id" value="{{ $team->id }}" type="hidden" />
            </label>

            <button class="w-full" type="submit">
                <div class="sidebar-row justify-between mb-1">
                    <div class="flex items-center">
                        <i class="fa-regular fa-clone"></i>
                        <p class="ml-2">Duplicate</p>
                    </div>
                </div>
            </button>
        </form>
    @endcan
    @can('note-update', [$workspace, $team])
        <div class="sidebar-row justify-between mb-1">
            <div class="flex items-center">
                <i class="fa-regular fa-pen-to-square"></i>
                <p class="ml-2">Rename</p>
            </div>
            <p class="text-xs text-gray-400">Ctrl+Alt+R</p>
        </div>
    @endcan
    @can('note-delete', $workspace)
        <form action="{{route('deleteNote', $workspace->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <label>
                <input name="note_id" hidden value="{{$note->id}}"/>
            </label>
            <button type="submit" class="w-full">
                <div class="sidebar-row justify-between mb-1">
                    <div class="flex items-center">
                        <i class="fa-regular fa-trash-can"></i>
                        <p class="ml-2">Delete</p>
                    </div>
                    <p class="text-xs text-gray-400">Ctrl+Alt+D</p>
                </div>
            </button>
        </form>
            <hr>
    @endcan

    <div class="sidebar-row justify-between my-1" onclick="openInNewTab()">
        <div class="flex items-center">
            <i class="fa-solid fa-arrow-up rotate-45"></i>
            <p class="ml-2">Open in new tab</p>
        </div>
        <p class="text-xs text-gray-400">Ctrl+Alt+N</p>
    </div>
    <hr>
    <div class="p-2 text-xs text-gray-400">
        <p>Created at {{ $note->updated_at->format('M d, Y, g:i A') }}</p>
    </div>
</div>

<script>
    function openInNewTab() {
        const currentUrl = window.location.href;
        window.open(currentUrl, '_blank');
    }

    document.addEventListener('keydown', function(event) {
        if (event.ctrlKey && event.altKey && (event.key === 'n' || event.key === 'N')) {
            openInNewTab();
        }
    });

    document.addEventListener('keydown', function(event) {
        if (event.ctrlKey && event.altKey && (event.key === 'd' || event.key === 'D')) {
            document.querySelector('form[action="{{route('deleteNote', $workspace->id)}}').submit();
        }
    });
</script>
