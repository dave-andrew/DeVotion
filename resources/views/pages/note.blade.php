@extends('layouts.app')

@section('title', 'Workspace')

@section('content')
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        Pusher.logToConsole = true;
        const pusher = new Pusher('5d84524b482b3b5c2a6f', {
            cluster: 'ap1'
        });

        const channel = pusher.subscribe('note-edit-channel.{{ $note->id }}');
        channel.bind('note-edit', function (response) {
            window.Livewire.emit('note-edit', response.note);
        });

        @foreach ($note->notedetails as $detail)
        const detailChannel = pusher.subscribe('note-detail-edit.{{ $detail->id }}');
        detailChannel.bind('note-detail-edit', function (response) {
            window.Livewire.emit('note-detail-edit', response.notedetail);
        });
        @endforeach
    </script>
    <div class="min-h-screen flex flex-grow py-20 overflow-y-auto">
        <div class="max-w-xl w-full mx-auto">

            @livewire('title', ['note' => $note])

            @foreach ($note->notedetails as $detail)
                <div class="w-full group relative mt-2">
                    @can('note-update', [$workspace, $note->teamspace])
                        <div class="absolute flex -left-12 top-1">
                            <button
                                class="group-hover:opacity-100 opacity-0 px-1 py-1 hover:bg-gray-100 rounded-md text-gray-400">
                                <i class="fa-solid fa-plus"></i></button>
                            <button
                                class="group-hover:opacity-100 opacity-0 px-1 py-1 hover:bg-gray-100 rounded-md text-gray-400 cursor-grab">
                                <i class="fa-solid fa-grip-vertical"></i></button>
                        </div>
                    @endcan
                    @livewire('note-detail', ['detail' => $detail, 'editable' => Gate::allows('note-update', [$workspace, $note->teamspace])])
                </div>
            @endforeach
        </div>
    </div>
@endsection
