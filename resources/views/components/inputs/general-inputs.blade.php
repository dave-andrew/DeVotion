<div class="w-full group relative mt-2">
    <div class="absolute flex -left-12 top-1">
        <button class="group-hover:opacity-100 opacity-0 px-1 py-1 hover:bg-gray-100 rounded-md text-gray-400"><i class="fa-solid fa-plus"></i></button>
        <button class="group-hover:opacity-100 opacity-0 px-1 py-1 hover:bg-gray-100 rounded-md text-gray-400 cursor-grab"><i class="fa-solid fa-grip-vertical"></i></button>
    </div>
    @if($data->type == 'text')
        @include('components.inputs.h1-input', ['data' => $data, 'class' => 'auto-submit-textarea'])
    @elseif($data->type == 'h2')
        @include('components.inputs.h2-input', ['data' => $data, 'class' => 'auto-submit-textarea'])
    @elseif($data->type == 'h3')
        @include('components.inputs.h3-input', ['data' => $data, 'class' => 'auto-submit-textarea'])
    @elseif($data->type == 'code')
        @include('components.inputs.code-input', ['data' => $data, 'class' => 'auto-submit-textarea'])
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const inputElement = document.getElementById(@json($data->id));

        inputElement.value = @json($data->content);
    });
</script>
