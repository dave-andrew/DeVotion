<div class="w-full group relative mt-2">
    <div class="absolute flex -left-12 top-1">
        <button class="group-hover:opacity-100 opacity-0 px-1 py-1 hover:bg-gray-100 rounded-md text-gray-400"><i class="fa-solid fa-plus"></i></button>
        <button class="group-hover:opacity-100 opacity-0 px-1 py-1 hover:bg-gray-100 rounded-md text-gray-400 cursor-grab"><i class="fa-solid fa-grip-vertical"></i></button>
    </div>
    <label>
        <textarea id="{{$data->id}}" class="text-4xl font-bold textarea p-4 ring-0 rounded-md" type="text" rows="1"></textarea>
    </label>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const noteTitleInput = document.getElementById(@json($data->id));

        noteTitleInput.value = @json($data->title);

        noteTitleInput.addEventListener('input', function (){
            console.log("change")
        })
    })

</script>
