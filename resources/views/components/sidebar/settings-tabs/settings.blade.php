<div x-show="tab==2" class="relative flex flex-col flex-grow py-4 px-8">
    <h1 class="mb-2 text-gray-500 font-medium ">Workspace settings</h1>
    <hr>
    @can('workspace-update', $workspace)
        <form class="my-4" action="{{route('updateWorkspace', [$workspace->id])}}" method="POST">
            @csrf
            @method('PUT')
            <h1 class="text-gray-500 text-xs">Name</h1>
            <label for="workspaceName"></label><input id="workspaceName" name="workspaceName" class="max-w-72 w-full mr-2 my-1 px-2 py-1 text-sm rounded-sm ring-1 ring-gray-300 border-none outline-none" type="text">
            <button class="px-4 py-1.5 rounded-sm ring-1 ring-gray-300 text-gray-500 text-sm font-medium hover:bg-gray-100" type="submit">Save</button>
        </form>
    @endcan

    @cannot('workspace-update', $workspace)
        <div class="my-4">
            <h1 class="text-gray-500 text-xs">Name</h1>
            <h1 class="text-black text-md">{{$workspace->name}}</h1>
        </div>
    @endcannot

    @can('workspace-delete', $workspace)
        <h1 class="mb-2 text-gray-500 font-medium ">Danger Zone</h1>
        <hr>
        <form class="my-4" action="{{route('deleteWorkspace', [$workspace->id])}}" method="post">
            @csrf
            @method('DELETE')
            <button class="px-4 py-1.5 rounded-sm ring-1 ring-red-500 text-red-500 text-sm font-medium hover:bg-red-100" type="submit">Delete entire workspace</button>
        </form>
    @endcan

</div>
<script>
    document.getElementById('workspaceName').value = @json($workspace->name);
</script>
