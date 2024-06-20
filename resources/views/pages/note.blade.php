@extends('layouts.app')

@section('title', 'Workspace')

@section('content')
    <div class="min-h-screen flex flex-grow py-20 overflow-y-auto">
        <div class="max-w-xl w-full mx-auto">

            @include('components.inputs.title')

            @foreach($note->notedetails as $data)
                @include('components.inputs.general-inputs', ['data' => $data])
            @endforeach

        </div>
    </div>
@endsection

