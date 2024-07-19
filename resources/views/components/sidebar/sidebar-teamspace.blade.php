<div x-cloak x-show="teamspace" x-on:click="teamspace=false" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 min-h-screen">
    <div @click.stop class="bg-white max-w-xl w-full max-h-96 h-full m-auto flex flex-col py-4 rounded-lg text-black shadow-lg">

        <div class="w-full flex flex-col justify-center px-8 mb-3 h-full">
            <h1 class="text-lg font-bold mb-2">Create Teamspace</h1>
            <h2 class="text-gray-500 font-semibold mb-4">Teamspaces are where your team organizes pages, permissions, and members</h2>

            <form action="{{ route('createTeamspace', $workspace->id) }}" method="post" class="flex flex-col justify-between h-full">
                @csrf
                <div class="flex flex-col space-y-4">
                    <div class="flex flex-col">
                        <label for="name" class="text-sm font-semibold">Name</label>
                        <input type="text" name="name" id="name" class="w-full h-10 border border-gray-300 rounded-md px-3 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent" required>
                    </div>

                    <div class="flex flex-col">
                        <label for="permission" class="text-sm font-semibold">Permission</label>
                        <select id="permission" name="permission" class="w-full h-10 border border-gray-300 rounded-md px-3 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent">
                            <option value="default">Default</option>
                            <option value="public">Public</option>
                            <option value="private">Private</option>
                        </select>
                    </div>

                    <input id="workspace_id" name="workspace_id" value="{{$workspace->id}}" type="hidden" />
                </div>

                <button type="submit" class="w-full h-10 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition-colors">Create Teamspace</button>
            </form>
        </div>
    </div>
</div>
