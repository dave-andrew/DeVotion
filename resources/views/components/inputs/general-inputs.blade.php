<div class="w-full group relative mt-2">
    <div class="absolute flex -left-12 top-1">
        <button class="group-hover:opacity-100 opacity-0 px-1 py-1 hover:bg-gray-100 rounded-md text-gray-400"><i class="fa-solid fa-plus"></i></button>
        <button class="group-hover:opacity-100 opacity-0 px-1 py-1 hover:bg-gray-100 rounded-md text-gray-400 cursor-grab"><i class="fa-solid fa-grip-vertical"></i></button>
    </div>
    @livewire('note-detail', ['notedetail' => $notedetail, 'note' => $note])
</div>