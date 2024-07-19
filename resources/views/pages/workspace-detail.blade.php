@extends('layouts.workspace')

@section('title', 'Create Workspace')

@section('content')

    <div class="flex flex-col justify-center items-center">
        <h1 class="text-3xl font-bold dark:text-white">Give your workspace a name!</h1>
        @if($type == 'team')
            <h1 class="text-2xl font-bold text-gray-500">Details help any collaborators that joined</h1>
        @elseif($type == 'personal')
            <h1 class="text-2xl font-bold text-gray-500">Help you stay organized</h1>
        @endif
        <form method="POST" action="{{ route('create.workspace') }}" enctype="multipart/form-data" class="pt-[10vh] w-full">
            @csrf
            <div class="flex flex-col items-center">
                <label for="image" class="flex flex-col justify-center mb-6 cursor-pointer">
                    <div class="image-placeholder w-[200px] h-[200px] flex items-center justify-center border-2 border-dashed border-gray-300 rounded-lg overflow-hidden">
                        <img id="imagePreview" alt="Workspace Detail" class="w-full h-full object-cover hidden">
                        <div id="imagePlaceholderText" class="absolute dark:text-white font-medium hover:text-blue-300 transition-all duration-500">Choose or add an image</div>
                    </div>
                    <input type="file" name="image" id="image" class="hidden">
                </label>
                <div class="flex flex-col w-full">
                    <label for="name" class="dark:text-white font-medium mb-1">Workspace Name</label>
                    <input type="text" name="name" id="name" class="auth-input w-full dark:bg-gray-700 dark:text-white" value="{{ old('name') }}">
                    <label for="description" class="dark:text-white font-medium mb-1">Description</label>
                    <input type="text" name="description" id="description" class="auth-input dark:bg-gray-700 dark:text-white" value="{{ old('description') }}">
                    <input type="hidden" name="type" value="{{ $type }}">
                </div>
                <button id="continueButton" class="bg-gray-500 rounded-lg text-white py-2 w-full mx-[5rem] my-[5vh] transition-all duration-700" type="submit" disabled>
                    Continue
                </button>
            </div>
        </form>
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
            @endforeach
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const nameInput = document.getElementById('name');
            const descriptionInput = document.getElementById('description');
            const continueButton = document.getElementById('continueButton');
            const imageInput = document.getElementById('image');
            const imagePreview = document.getElementById('imagePreview');
            const imagePlaceholderText = document.getElementById('imagePlaceholderText');

            function updateButtonState() {
                if (nameInput.value.trim() !== '' && descriptionInput.value.trim() !== '') {
                    continueButton.disabled = false;
                    continueButton.classList.remove('bg-gray-500');
                    continueButton.classList.add('bg-blue-500');
                } else {
                    continueButton.disabled = true;
                    continueButton.classList.remove('bg-blue-500', 'hover:bg-blue-700');
                    continueButton.classList.add('bg-gray-500');
                }
            }

            nameInput.addEventListener('input', updateButtonState);
            descriptionInput.addEventListener('input', updateButtonState);

            imageInput.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        imagePreview.src = e.target.result;
                        imagePreview.classList.remove('hidden');
                        imagePlaceholderText.classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                } else {
                    imagePreview.src = '';
                    imagePreview.classList.add('hidden');
                    imagePlaceholderText.classList.remove('hidden');
                }
            });
        });
    </script>

    <style>
        .image-placeholder {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        #imagePlaceholderText {
            position: absolute;
            z-index: 10;
        }
    </style>

@endsection
