<div x-show="action" class="z-10 absolute  -right-56 w-72 pt-2 bg-white rounded-md shadow-lg text-black text-sm font-normal" @click.outside="action = false">
    <div class="sidebar-row justify-between mb-1">
        <div class="flex items-center">
            <i class="fa-regular fa-clone "></i>
            <p class="ml-2">Duplicate</p>
        </div>
        <p class="text-xs text-gray-400">Ctrl+D</p>
    </div>
    <div class="sidebar-row justify-between mb-1">
        <div class="flex items-center">
            <i class="fa-regular fa-pen-to-square"></i>
            <p class="ml-2">Rename</p>
        </div>
        <p class="text-xs text-gray-400">Ctrl+Shift+R</p>
    </div>
    <div class="sidebar-row mb-1">
        <div class="flex items-center">
            <i class="fa-regular fa-trash-can"></i>
            <p class="ml-2">Delete</p>
        </div>
    </div>
    <hr>
    <div class="sidebar-row justify-between my-1">
        <div class="flex items-center">
            <i class="fa-solid fa-arrow-up rotate-45"></i>
            <p class="ml-2">Open in new tab</p>
        </div>
        <p class="text-xs text-gray-400">Ctrl+Shift+N</p>
    </div>
    <hr>
    <div class="p-2 text-xs text-gray-400">
        <p>Last edited by Dep</p>
        <p>Jan 19, 2024, 6:31 AM</p>
    </div>
</div>