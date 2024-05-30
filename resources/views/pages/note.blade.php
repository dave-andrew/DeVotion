@extends('layouts.app')

@section('title', 'Workspace')

@section('content')
    <div class="min-h-screen flex flex-grow py-20">
        <div class="max-w-xl w-full mx-auto">
            {{-- Title --}}
            <textarea class=" text-4xl font-bold textarea" type="text" placeholder="Untitled"></textarea>

            @include('components.inputs.h1-input')
            @include('components.inputs.h2-input')
            @include('components.inputs.h3-input')
        </div>
    </div>
@endsection