<div x-show="pos==2">

    <div class="flex flex-col text-sm text-gray-400 border-gray-300 overflow-x-auto ">
        <div class="flex py-2 text-left border-b ">
            <p class="w-52 pl-2 pr-4 border-r">User</p>
            <p class="w-44 pl-4 pr-1 border-r">Email</p>
            <p class="w-12 px-1"></p>
        </div>
        <template x-for="user in filteredInvitation" :key="user.id">
            <div class="flex py-2 border-b">
                <p class="w-52 pl-2 pr-4 border-r" x-text="user.username"></p>
                <p class="w-44 pl-4 pr-1 border-r" x-text="user.email"></p>
            </div>
        </template>
    </div>

    @if($workspace->invitations->isEmpty())
        <div class="flex justify-center text-gray-500 pt-4">
            No pending invitations
        </div>
    @endif

</div>
