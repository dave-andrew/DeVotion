<div x-show="action"
     class="z-50 absolute -right-56 mt-[-10px] w-72 pt-2 bg-white rounded-md shadow-lg text-black text-sm font-normal flex flex-col"
     @click.outside="action = false"
     x-on:mouseenter="action=true"
     x-on:mouseleave="action=false">

    <form action="{{route('duplicateNote', $workspace->id)}}" method="POST">
        @csrf
        <label>
            <input name="note_id" value="{{$note->id}}" type="hidden" />
        </label>

        <label>
            <input name="teamspace_id" value="{{ $team->id }}" type="hidden" />
        </label>

        <button type="submit" class="w-full">
            <div class="sidebar-row justify-between mb-1">
                <div class="flex items-center">
                    <i class="fa-regular fa-clone"></i>
                    <p class="ml-2">Duplicate</p>
                </div>
            </div>
        </button>
    </form>

    <div class="sidebar-row justify-between mb-1">
        <div class="flex items-center">
            <i class="fa-regular fa-pen-to-square"></i>
            <p class="ml-2">Rename</p>
        </div>
        <p class="text-xs text-gray-400">Ctrl+Alt+R</p>
    </div>
    @can('note-delete', $workspace)
        <form id="note-delete" action="{{route('deleteNote', $workspace->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <label>
                <input name="note_id" hidden value="{{$note->id}}"/>
            </label>
            <button type="submit" class="w-full">
                <div class="sidebar-row mb-1 justify-between">
                    <div class="flex items-center">
                        <i class="fa-regular fa-trash-can"></i>
                        <p class="ml-2">Delete</p>
                    </div>
                    <p class="text-xs text-gray-400">Ctrl+Alt+D</p>
                </div>
            </button>
        </form>
    @endcan
    <hr>
    <div class="sidebar-row justify-between my-1" onclick="openInNewTab()">
        <div class="flex items-center">
            <i class="fa-solid fa-arrow-up rotate-45"></i>
            <p class="ml-2">Open in new tab</p>
        </div>
        <p class="text-xs text-gray-400">Ctrl+Alt+N</p>
    </div>
    <hr>
    <div class="p-2 text-xs text-gray-400">
        <p>Last edited by Dep</p>
        <p>{{ $note->updated_at->format('M d, Y, g:i A') }}</p>
    </div>
</div>

<script>
    function openInNewTab() {
        const currentUrl = window.location.href;
        window.open(currentUrl, '_blank');
    }

    function deleteNote() {
        document.getElementById("note-delete").submit();
    }

    document.addEventListener('keydown', function(event) {
        if (event.ctrlKey && event.altKey && (event.key === 'n' || event.key === 'N')) {
            openInNewTab();
        }
    });

    document.addEventListener('keydown', function(event) {
        if (event.ctrlKey && event.altKey && (event.key === 'd' || event.key === 'D')) {
            deleteNote();
        }
    });


</script>
