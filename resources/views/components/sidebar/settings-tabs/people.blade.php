<div x-cloak x-show="tab==3" class="relative flex flex-col flex-grow py-4 px-8" x-data="{ pos: 1 }">
    <h1 class="mb-2 text-gray-500 font-medium ">People</h1>
    <hr>
    <div class="w-full mt-2">
        <div class="flex justify-between items-center border-b border-gray-300">
            <div class="flex">
                <button x-on:click="pos = 1"
                        :class="{'border-b border-black text-black' : pos ==1, 'text-gray-400': pos!=1 }" class="p-2">
                    Members
                </button>
                <button x-on:click="pos = 2"
                        :class="{'border-b border-black text-black' : pos ==2, 'text-gray-400': pos!=2}" class="p-2">
                    Pending
                </button>
            </div>
            <div class="flex items-center ">
                <div class="flex items-center  mr-2">
                    <i class="fa-solid fa-magnifying-glass fa-sm mr-2 text-gray-500"></i>
                    <input class="max-w-40 w-full  text-black text-sm outline-none border-none ring-0" type="text"
                           placeholder="Type to search...">
                </div>
                <div class="flex items-center" x-data="{ invite: false }">
                    <button x-on:click="invite=true" class=" bg-blue-500 p-2 rounded-md text-white text-xs font-medium">
                        Add members
                    </button>
                    @include('components.sidebar.settings-tabs.people-component.invite')
                </div>
            </div>
        </div>

        @include('components.sidebar.settings-tabs.people-component.workspace-member')
        @include('components.sidebar.settings-tabs.people-component.pending-invite')
    </div>
</div>
