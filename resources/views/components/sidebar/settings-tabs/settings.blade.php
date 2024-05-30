<div x-show="tab==2" class="relative flex flex-col flex-grow py-4 px-8">
    <h1 class="mb-2 text-gray-500 font-medium ">Workspace settings</h1>
    <hr>
    <form class="my-4" action="">
        <h1 class="text-gray-500 text-xs">Name</h1>
        <input class="max-w-72 w-full mr-2 my-2 px-2 py-1 text-sm rounded-sm ring-1 ring-gray-300 border-none outline-none" type="text" value="">
    </form>
    <h1 class="mb-2 text-gray-500 font-medium ">Danger Zone</h1>
    <hr>
    <form class="my-4" action="">
        <button class="px-4 py-1.5 rounded-sm ring-1 ring-red-500 text-red-500 text-sm font-medium hover:bg-red-100">Delete entire workspace</button>
    </form>

    <div class="absolute bottom-4 flex">
        <form class="mr-2" action="">
            <button class="bg-blue-500 px-4 py-1.5 rounded-md text-white font-medium hover:bg-blue-600">Update</button>
        </form>
        <button class="px-4 py-1.5 rounded-md ring-1 ring-gray-300 hover:bg-gray-200">Cancel</button>
    </div>
</div>