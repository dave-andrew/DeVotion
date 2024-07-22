<div class="w-full group relative mt-2">
    @if($editable)
        @if($type === 'text')
            <label for="{{ $detail->id }}"></label>
            <textarea id="{{ $detail->id }}" wire:model="content" wire:change="onChange" oninput="checkSlash(this)"
                      class="text-3xl textarea p-4 ring-0 rounded-md w-full" rows="1">
            </textarea>
        @elseif($type === 'code')
            <label for="{{ $detail->id }}"></label>
            <textarea id="{{ $detail->id }}" wire:model="content" wire:change="onChange" oninput="checkSlash(this)"
                      class="text-xl textarea p-4 ring-0 rounded-md w-full" rows="1" style="background-color: #eeeeee; font-family: monospace; white-space: pre;">
            </textarea>
        @endif
    @else
        <div class="text-3xl p-4 bg-white rounded-md w-full">
            {!! $detail->content !!}
        </div>
    @endif
</div>

<script>
    function checkSlash(textarea) {
        if (textarea.value.includes('/code')) {
            textarea.value = textarea.value.replace('/code', '');
            @this.set('type', 'code');
        }

        if(textarea.value.includes('/text')) {
            textarea.value = textarea.value.replace('/text', '');
            @this.set('type', 'text');
        }
    }


</script>
