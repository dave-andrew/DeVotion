<div x-cloak x-show="setting" x-on:click="setting=false" x-data="{tab:1}"
    class="z-40 fixed inset-0 min-w-screen min-h-screen flex justify-center items-center bg-black bg-opacity-50">
    <div @click.stop
        class="bg-white max-w-5xl w-full max-h-[500px] h-full m-auto flex rounded-lg text-black">
        <div class="w-60 h-full bg-stone-100 rounded-l-lg flex flex-col justify-start py-2  font-medium">
            <button x-on:click="tab=1" class="px-2 py-1.5 mx-1.5 my-1 flex items-center rounded-md hover:bg-stone-200 hover:cursor-pointer transition-all duration-300">
                <i class="fa-solid fa-circle-user mr-2"></i>
                <div class="text-sm ">
                    My Account
                </div>
            </button>
            <button x-on:click="tab=2" class="px-2 py-1.5 mx-1.5 my-1 flex items-center rounded-md hover:bg-stone-200 hover:cursor-pointer transition-all duration-300">
                <i class="fa-solid fa-gear fa-md mr-2 "></i>
                <div class="text-sm ">
                    Settings
                </div>
            </button>
            <button x-on:click="tab=3" class="px-2 py-1.5 mx-1.5 my-1 flex items-center rounded-md hover:bg-stone-200 hover:cursor-pointer transition-all duration-300">
                <i class="fa-solid fa-user-group mr-2"></i>
                <div class="text-sm ">
                    People
                </div>
            </button>
        </div>
        @include('components.sidebar.settings-tabs.my-account')
        @include('components.sidebar.settings-tabs.settings')
        @include('components.sidebar.settings-tabs.people')
    </div>
</div>
