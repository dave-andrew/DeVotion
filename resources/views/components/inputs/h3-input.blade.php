<div class="group w-full flex items-start -ml-16">
    <button class="group-hover:opacity-100 opacity-0 px-2 py-0.5 hover:bg-gray-100 rounded-md text-gray-400"><i class="fa-solid fa-plus"></i></button>
    <button class="group-hover:opacity-100 opacity-0 px-2 py-0.5 hover:bg-gray-100 rounded-md text-gray-400"><i class="fa-solid fa-grip-vertical"></i></button>
    <textarea id="{{$data->id}}" class="text-xl textarea ml-2 {{$class}}" type="text" placeholder="Untitled"></textarea>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const inputElement = document.getElementById(@json($data->id));

        inputElement.onchange(function() {
            console.log('change');
        })
    });
</script>
