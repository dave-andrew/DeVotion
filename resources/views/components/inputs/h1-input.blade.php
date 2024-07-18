<label for="input-data"></label><textarea id="{{$data->id}}" class="text-3xl textarea p-4 ring-0 rounded-md w-full" rows="1" type="text" class="{{$class}}"></textarea>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const inputElement = document.getElementById(@json($data->id));
        inputElement.onchange(function() {
            console.log('change');
        })
    });
</script>
