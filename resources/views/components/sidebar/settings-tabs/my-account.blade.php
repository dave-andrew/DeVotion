<div x-show="tab==1" class="relative flex flex-col flex-grow py-4 px-8">
    <h1 class="mb-2 text-gray-500 font-medium ">My Profile</h1>
    <hr>
    <form class="mt-4" action="{{route('changeUsername')}}">
        @csrf
        @method("PUT")
        <h1 class="text-gray-500 text-xs">Preferred name</h1>
        <input id="username" class="max-w-72 w-full mr-2 my-2 px-2 py-1 text-sm rounded-sm ring-1 ring-gray-300 border-none outline-none" type="text">
    </form>

    <h1 class="mb-2 text-gray-500 font-medium mt-2">Account Security</h1>
    <hr>
    <form class="flex justify-between mt-4" action="" method="POST">
        @csrf
        @method("PUT")
        <div class="flex flex-col">
            <h1 class="text-gray-500 text-sm font-semibold">Email</h1>
            <div class="text-gray-500 text-xs font-semibold">{{Auth::user()->email}}</div>
        </div>
        <button>Change Email</button>
    </form>

    <div class="flex justify-between mt-4">
        <div class="flex flex-col">
            <h1 class="text-gray-500 text-sm font-semibold">Password</h1>
            <div class="text-gray-500 text-xs font-semibold">********</div>
        </div>
        <button>Change Password</button>
    </div>

    <div class="mt-8">
        <h1 class="mb-2 text-gray-500 font-medium ">Danger Zone</h1>
        <hr>
        <form class="my-4" action="{{route('deleteAccount')}}" method="post">
            @csrf
            <button class="px-4 py-1.5 rounded-sm ring-1 ring-red-500 text-red-500 text-sm font-medium hover:bg-red-100" type="submit">Delete account</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('username').value = @json(Auth::user()->username);
</script>
