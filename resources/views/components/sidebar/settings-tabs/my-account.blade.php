<div x-show="tab==1" class="relative flex flex-col flex-grow py-4 px-8">
    <h1 class="mb-2 text-gray-500 font-medium ">My Profile</h1>
    <hr>
    <form class="mt-4" action="">
        <h1 class="text-gray-500 text-xs">Preferred name</h1>
        <input id="username" class="max-w-72 w-full mr-2 my-2 px-2 py-1 text-sm rounded-sm ring-1 ring-gray-300 border-none outline-none" type="text">
    <div class="absolute bottom-4 flex">
        <button class="bg-blue-500 px-4 py-1.5 rounded-md text-white font-medium hover:bg-blue-600 mr-2" type="submit">Update</button>
        <button class="px-4 py-1.5 rounded-md ring-1 ring-gray-300 hover:bg-gray-200">Cancel</button>
    </div>
</form>
</div>

<script>
    document.getElementById('username').value = @json(Auth::user()->username);
</script>