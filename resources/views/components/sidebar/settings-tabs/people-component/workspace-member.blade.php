<div x-show="pos==1">
    <div class="flex flex-col text-sm text-gray-400 border-gray-300 overflow-x-auto ">
        <div class="flex py-2 text-left border-b ">
            <p class="w-52 pl-2 pr-4 border-r">User</p>
            <p class="w-44 pl-4 pr-1 border-r">Email</p>
            <p class="w-108 pl-4 ">Role</p>
            <p class="w-12 px-1"></p>
        </div>
        <template x-for="user in filteredUsers" :key="user.id">
            <div class="flex py-2 border-b" x-data="{ promoteDrop: false }">
                <p class="w-52 pl-2 pr-4 border-r" x-text="user.username"></p>
                <p class="w-44 pl-4 pr-1 border-r" x-text="user.email"></p>
                <div class="w-108 pl-4" :class="{'font-bold': user.pivot.role == 'owner'}" x-text="userRole(user.pivot.role)"></div>
                <template x-if="user.id != authUserId && canPromoteOrDemote">
                    <div>
                        <button class="w-12 px-1" x-on:click="promoteDrop = true">
                            <i class="fa-solid fa-ellipsis hover:bg-gray-100 px-2 py-1 rounded-md"></i>
                        </button>
                        @include('components.sidebar.settings-tabs.people-component.user-menu')
                    </div>
                </template>
            </div>
        </template>
    </div>
</div>
