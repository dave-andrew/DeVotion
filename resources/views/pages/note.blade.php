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
        channel.bind('note-edit', function(response) {
            window.Livewire.emit('note-edit', response.note);
        });

        @foreach ($note->notedetails as $detail)
            const detailChannel = pusher.subscribe('note-detail-edit.{{ $detail->id }}');
            detailChannel.bind('note-detail-edit', function(response) {
                window.Livewire.emit('note-detail-edit', response.notedetail);
            });
        @endforeach
    </script>
    <div class="min-h-screen flex flex-grow py-20 overflow-y-auto">
        <div class="max-w-xl w-full mx-auto">

            @livewire('title', ['note' => $note])
            @foreach ($note->notedetails as $detail)
                @livewire('note-detail', ['detail' => $detail])
            @endforeach
        </div>
    </div>
@endsection
