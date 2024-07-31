<div class="group">

    @if($editable)
        <label>
            <textarea id="{{$note->id}}" wire:model="title" wire:change="onChange" class="text-4xl font-bold textarea p-4 ring-0 rounded-md autoresize" type="text" rows="1"></textarea>
        </label>
    @else

        <div class="text-4xl font-bold p-4 bg-white rounded-md w-full">
            {!! $note->title !!}
        </div>

    @endif
</div>
