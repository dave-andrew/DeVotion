<div>
    @foreach($notedetails as $detail)
        <label for="{{ $detail->id }}"></label>
        <textarea id="{{ $detail->id }}"
                  wire:model="contents.{{ $detail->id }}"
                  wire:change="onChange({{ $detail->id }})"
                  class="text-3xl textarea p-4 ring-0 rounded-md w-full" rows="1">
        </textarea>
    @endforeach
</div>
