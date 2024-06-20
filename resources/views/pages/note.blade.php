@extends('layouts.app')

@section('title', 'Workspace')

@section('content')
    <div class="min-h-screen flex flex-grow py-20 overflow-y-auto">
        <div class="max-w-xl w-full mx-auto">
            <label>
                <textarea id="note-title" class="text-4xl font-bold textarea p-4 ring-0 rounded-md" type="text"></textarea>
            </label>

            @foreach($note->notedetails as $data)
                @include('components.inputs.general-inputs', ['data' => $data])
            @endforeach

        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const noteTitleInput = document.getElementById('note-title');

        noteTitleInput.value = @json($note->title);
    });
</script>
