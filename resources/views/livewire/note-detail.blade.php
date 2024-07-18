<label for="{{ $notedetail->id }}"></label>
<textarea id="{{ $notedetail->id }}"
          wire:model="contents"
          wire:change="onChange"
          class="text-3xl textarea p-4 ring-0 rounded-md w-full" rows="1">
</textarea>
