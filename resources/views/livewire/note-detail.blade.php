<div>
    <label for="{{ $detail->id }}"></label>
    <textarea id="{{ $detail->id }}" wire:model="content" wire:input="onChange"
        class="text-3xl textarea p-4 ring-0 rounded-md w-full" rows="1">
        </textarea>
</div>
