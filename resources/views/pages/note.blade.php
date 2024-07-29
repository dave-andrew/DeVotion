@extends('layouts.app')

@section('title', 'Workspace')

@section('content')
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        // Pusher.logToConsole = true;
        const pusher = new Pusher('5d84524b482b3b5c2a6f', {
            cluster: 'ap1'
        });

        const channel = pusher.subscribe('note-edit-channel.{{ $note->id }}');
        channel.bind('note-edit', function (response) {
            window.Livewire.emit('note-edit', response.note);
        });
        const noteDetails = @json($note->notedetails);

        const detailChannels = {};

        noteDetails.map(detail => {

            const channelKey = `detailChannel_${detail.id}`;

            detailChannels[channelKey] = pusher.subscribe(`note-detail-edit.${detail.id}`);
            detailChannels[channelKey].bind('note-detail-edit', function (response) {
                window.Livewire.emit('note-detail-edit', response.notedetail);
            });
        });

        const newDetailChannel = pusher.subscribe(`note-block-channel.{{ $note->id }}`);
        newDetailChannel.bind('note-block-edit', function (response) {
            window.location.reload();
        });
    </script>
    <script>
        document.addEventListener('keydown', (e) => {
            if (e.shiftKey && e.key === 'Enter' && e.target.tagName.toLowerCase() === 'textarea') {
                e.preventDefault();
                document.getElementById('addNoteDetail').submit();
            }
        })
    </script>
    <div class="min-h-screen flex flex-grow py-20 overflow-y-auto">
        <div class="max-w-xl w-full mx-auto">

            <div class="group">
                @can('note-update', [$workspace, $note->teamspace])
                    <div class="w-full relative mt-2">
                        <div class="absolute flex -left-8 top-1">
                            <form method="POST" action="{{route("addNoteDetail", $workspace->id)}}" id="addNoteDetail">
                                @csrf
                                <input type="hidden" name="teamspace_id" value="{{$note->teamspace->id}}">
                                <input type="hidden" name="note" value="{{$note->id}}">
                                <button
                                    type="submit"
                                    class="group-hover:opacity-100 opacity-0 px-1 py-1 hover:bg-gray-100 rounded-md text-gray-600">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endcan
                @livewire('title', ['note' => $note, 'editable' => Gate::allows('note-update', [$workspace, $note->teamspace])])
            </div>

            @foreach ($note->notedetails as $detail)
                <div class="w-full group relative mt-2">
                    @can('note-update', [$workspace, $note->teamspace])
                        <div class="absolute flex -left-8 top-1">
                            <form method="POST" action="{{route("addNoteDetail", $workspace->id)}}">
                                @csrf
                                <input type="hidden" name="teamspace_id" value="{{$note->teamspace->id}}">
                                <input type="hidden" name="note" value="{{$note->id}}">
                                <button
                                    type="submit"
                                    class="group-hover:opacity-100 opacity-0 px-1 py-1 hover:bg-gray-100 rounded-md text-gray-600">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </form>
                        </div>
                    @endcan
                    @livewire('note-detail', ['detail' => $detail, 'editable' => Gate::allows('note-update', [$workspace, $note->teamspace])])
                        @can('note-update', [$workspace, $note->teamspace])
                            <div class="absolute flex right-2 top-1">
                                <form method="POST" action="{{route("deleteNoteDetail", $workspace->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="teamspace_id" value="{{$note->teamspace->id}}">
                                    <input type="hidden" name="note_detail_id" value="{{$detail->id}}">
                                    <button
                                        type="submit"
                                        class="group-hover:opacity-100 opacity-0 px-1 py-1 rounded-md text-gray-400">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        @endcan
                </div>
            @endforeach
        </div>
    </div>
@endsection
