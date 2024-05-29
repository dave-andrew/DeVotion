<div x-show="search" x-on:click="search=false"
    class="z-40 fixed inset-0 min-w-screen min-h-screen flex justify-center items-center bg-black opacity-50">
    <div @click.stop
        class="bg-white max-w-3xl w-full min-h-96 m-auto flex flex-col py-4 rounded-lg text-black">
        {{-- Search Bar --}}
        <div class="w-full flex items-center px-4 mb-3">
            <i class="fa-solid fa-magnifying-glass fa-lg mr-2 text-gray-500"></i>
            <input class="w-full text-black text-xl outline-none border-none ring-0" type="text"
                placeholder="Search in Your Notion...">
        </div>
        {{-- List of all workspace --}}
        <div class="w-full border-t border-gray-300 px-2 py-4 box-border overflow-y-auto">
            <a href=""
                class="w-full px-4 py-2  flex items-center flex-shrink-0 flex-grow rounded-md hover:bg-stone-200 hover:cursor-pointer transition-all duration-300">
                <i class="fa-regular fa-file-zipper fa-lg mr-2"></i>
                <div class="flex items-center flex-1 text-nowrap text-clip overflow-hidden">
                    <div class="text-ellipsis text-sm font-medium whitespace-nowrap overflow-hidden">
                        Workspace Number One
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
