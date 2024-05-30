<div x-cloak x-show="tab==3" class="relative flex flex-col flex-grow py-4 px-8" x-data="{ pos: 1 }">
    <h1 class="mb-2 text-gray-500 font-medium ">People</h1>
    <hr>
    <div class="w-full mt-2">
        <div class="flex justify-between items-center border-b border-gray-300">
            <div class="flex">
                <button x-on:click="pos = 1" :class="{'border-b border-black text-black' : pos ==1, 'text-gray-400': pos!=1 }" class="p-2">
                    Members
                </button>
                <button x-on:click="pos = 2" :class="{'border-b border-black text-black' : pos ==2, 'text-gray-400': pos!=2 }" class="p-2 ">
                    Guests
                </button>
                <button x-on:click="pos = 3" :class="{'border-b border-black text-black' : pos ==3, 'text-gray-400': pos!=3}" class="p-2">
                    Groups
                </button>
            </div>
            <div class="flex items-center ">
                <div class="flex items-center  mr-2">
                    <i class="fa-solid fa-magnifying-glass fa-sm mr-2 text-gray-500"></i>
                    <input class="max-w-40 w-full  text-black text-sm outline-none border-none ring-0" type="text"
                        placeholder="Type to search...">
                </div>
                <button class=" bg-blue-500 p-2 rounded-md text-white text-xs font-medium ">Add members</button>
            </div>
        </div>
        <div class="flex flex-col text-sm text-gray-400 border-gray-300 overflow-x-auto ">
            <div class="flex py-2 text-left border-b ">
                <p class="w-52 pl-2 pr-4 border-r">User</p>
                <p class="w-44 pl-4 pr-1">Teamspaces</p>
                <p class="w-28 px-1 ">Groups</p>
                <p class="w-36 px-1 ">Role</p>
                <p class="w-12 px-1"></p>
            </div>
            <div class="flex py-2 border-b">
                <p class="w-52 pl-2 pr-4 border-r">Test</p>
                <p class="w-44 pl-4 pr-1 ">No access</p>
                <p class="w-28 px-1 ">None</p>
                <p class="w-36 px-1 ">Workspace owner</p>
                <button class="w-12 px-1 "><i class="fa-solid fa-ellipsis hover:bg-gray-100 px-2 py-1 rounded-md"></i></button>
            </div>
        </div>
    </div>
</div>
