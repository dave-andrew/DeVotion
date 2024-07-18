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
        channel.bind('node-edit', function(notedetail) {
            console.log(notedetail);
        });
    </script>
    <div class="min-h-screen flex flex-grow py-20 overflow-y-auto">
        <div class="max-w-xl w-full mx-auto">

            @include('components.inputs.title', ['data' => $note])


            @foreach($note->notedetails as $data)
                @include('components.inputs.general-inputs', ['data' => $data])
            @endforeach


        </div>
    </div>
@endsection

