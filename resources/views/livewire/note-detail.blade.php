<div class="w-full group relative mt-2">
    @if($editable)
        <label for="{{ $detail->id }}"></label>
        <textarea id="{{ $detail->id }}" wire:model="content" wire:input="onChange"
                  class="text-3xl textarea p-4 ring-0 rounded-md w-full" rows="1">
        </textarea>
    @else
        <div class="text-3xl p-4 bg-white rounded-md w-full">
            {!! $detail->content !!}
        </div>

    @endif
</div>
