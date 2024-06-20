<div x-show="userDrop" class="z-10 absolute -right-32 top-10 w-72 pt-2 bg-white rounded-md shadow-lg text-black text-sm font-normal" @click.outside="userDrop = false">

    @auth
        <div class="text-xs px-4 text-gray-500 mb-2">{{Auth::user()->email}}</div>
    @endauth

    @foreach(\Illuminate\Support\Facades\Auth::user()->workspaces as $workspace)
        <form class="sidebar-row mb-1" action="{{route('viewWorkspace', $workspace->id)}}" method="GET">
            <div class="mr-2">
                <i class="fa-regular fa-building"></i>
            </div>
            <button type="submit">
                {{ $workspace->name }}
            </button>
        </form>
    @endforeach
    <hr>
    <div class="flex flex-col px-4 py-2">
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button class="text-gray-500 text-xs" type="submit">Logout Account</button>
        </form>
    </div>

</div>
