<div x-show="pos==1">
    <div class="flex flex-col text-sm text-gray-400 border-gray-300 overflow-x-auto ">
        <div class="flex py-2 text-left border-b ">
            <p class="w-52 pl-2 pr-4 border-r">User</p>
            {{--                TODO: Teamspace & Group kalo ada waktu aja yak bro--}}
            {{--                <p class="w-44 pl-4 pr-1">Teamspaces</p>--}}
            {{--                <p class="w-28 px-1 ">Groups</p>--}}
            <p class="w-108 px-1 ">Role</p>
            <p class="w-12 px-1"></p>
        </div>
        @foreach($workspace->users as $user)
            <div class="flex py-2 border-b">
                <p class="w-52 pl-2 pr-4 border-r">{{$user->username}}</p>
                {{--                <p class="w-44 pl-4 pr-1 ">No access</p>--}}
                {{--                <p class="w-28 px-1 ">None</p>--}}
                @if($user->pivot->role == 'owner')
                    <div class="w-108 px-1 font-bold">Workspace Owner</div>
                @elseif($user->pivot->role == 'admin')
                    <div class="w-108 px-1 ">Admin</div>
                @elseif($user->pivot->role == 'member')
                    <div class="w-108 px-1 ">Member</div>
                @endif
                <button class="w-12 px-1 "><i
                        class="fa-solid fa-ellipsis hover:bg-gray-100 px-2 py-1 rounded-md"></i></button>
            </div>
        @endforeach
    </div>
</div>
