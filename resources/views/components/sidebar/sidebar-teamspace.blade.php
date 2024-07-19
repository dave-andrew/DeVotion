<div x-cloak x-show="teamspace" x-on:click="teamspace=false"
    class="z-50 fixed inset-0 min-w-screen min-h-screen flex justify-center items-center bg-black bg-opacity-50">
    <div @click.stop
        class="z-50 bg-white max-w-3xl w-full max-h-96 h-full m-auto flex flex-col py-4 rounded-lg text-black">

        <div class="w-full flex flex-col justify-center px-8 mb-3">
            <h1 class="text-lg font-bold">Create Teamspace</h1>
            <h2 class="text-gray-500 font-semibold">Teamspaces are where your team organizes pages, permissions, and members</h2>

            <form action="{{ route('createTeamspace', $workspace->id) }}" method="post" class="flex flex-col mt-4">
                @csrf
                <label for="name" class="text-sm font-semibold">Name</label>
                <input type="text" name="name" id="name" class="w-full h-10 border border-gray-300 rounded-md px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-300" required>

                <select id="permission" name="permission">
                    <option value="default">Default</option>
                    <option value="public">Public</option>
                    <option value="private">Private</option>
                </select>

                <input id="workspace_id" name="workspace_id" value="{{$workspace->id}}" hidden />

                <button type="submit" class="w-full h-10 bg-blue-500 text-white font-semibold rounded-md mt-4">Create Teamspace</button>
            </form>
        </div>

    </div>
</div>
