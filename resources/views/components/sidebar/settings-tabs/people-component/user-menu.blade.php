<div x-show="promoteDrop"
     class="z-60 absolute -right-20 top-40 w-72 pt-2 bg-white rounded-md shadow-lg text-black text-sm font-normal"
     @click.outside="promoteDrop=false"
     x-cloak>

    <h1 class="text-sm font-bold text-gray-500 px-4 mb-2">Manage Roles</h1>

    <hr class="mb-2">

    <form id="roleForm" action="{{ route('promoteUser', $workspace->id) }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{$user->id}}" />

        @can('user-isOwner', $workspace)
            <label>
                <div class="sidebar-row mb-2 text-gray-500">
                    <input type="radio" name="role" value="Owner" class="visually-hidden" onchange="submitForm()" />
                    Workspace Owner
                </div>
            </label>
        @endcan
        @can('user-isAdminOrOwner', $workspace)
            <label>
                <div class="sidebar-row mb-2 text-gray-500">
                    <input type="radio" name="role" value="Admin" class="visually-hidden" onchange="submitForm()" />
                    Admin
                </div>
            </label>
            <label>
                <div class="sidebar-row mb-2 text-gray-500">
                    <input type="radio" name="role" value="Member" class="visually-hidden" onchange="submitForm()" />
                    Member
                </div>
            </label>
        @endcan
    </form>
</div>


<script>
    function submitForm() {
        document.getElementById("roleForm").submit();
    }
</script>
