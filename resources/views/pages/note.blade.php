@extends('layouts.app')

@section('title', 'Workspace')

@section('content')
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        Pusher.logToConsole = true;
        const pusher = new Pusher('5d84524b482b3b5c2a6f', {
            cluster: 'ap1'
        });

        const channel = pusher.subscribe('node-edit-channel.{{$note->id}}');
        channel.bind('node-edit', function(response) {
            window.Livewire.emit('node-edit', response.note);
            window.Livewire.emit('note-edit', response.note.notedetails, response.note)
            // console.log(response.note.notedetails)
        });
    </script>
    <div class="min-h-screen flex flex-grow py-20 overflow-y-auto">
        <div class="max-w-xl w-full mx-auto">

            @livewire('title', ['note' => $note])

            @livewire('note-detail', ['note' => $note])
        </div>
    </div>
@endsection

