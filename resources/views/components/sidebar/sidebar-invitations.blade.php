<div x-cloak x-show="invitations" x-on:click="invitations=false"
     class="z-50 fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <div @click.stop
         class="z-50 bg-white max-w-3xl w-full max-h-96 h-full m-auto flex flex-col py-4 rounded-lg shadow-lg text-black">
        <div class="w-full flex flex-col justify-center px-8 mb-3">

            <h1 class="text-lg font-bold mb-4">Invitations</h1>
            @if(Auth::user()->invitations->count() > 0)
                <div class="w-full flex flex-col justify-center mb-3">

                    <h2 class="text-gray-500 font-semibold mb-3">You have {{ Auth::user()->invitations->count() }} invitations</h2>
                    @foreach(Auth::user()->invitations as $invitation)
                        <div class="flex items-center mb-4 rounded-lg p-4 shadow-md bg-neutral-50">
                            <img src="{{asset($invitation->workspace->image)}}" alt="{{ $invitation->workspace->name }}" class="h-10 w-10 rounded-full mr-4" />
                            <div class="flex flex-col">
                                <h1 class="text-gray-700 font-semibold">{{ $invitation->workspace->name }}</h1>
                                <h2 class="text-gray-500">{{ $invitation->invitedBy->username }}</h2>
                            </div>
                            <div class="flex items-center ml-auto gap-2">
                                <form method="POST" action="{{ route('invitation.accept') }}">
                                    @csrf
                                    <input type="hidden" name="invitation_id" value="{{ $invitation->id }}">
                                    <button type="submit" class="bg-white text-gray-800 p-2 rounded-md text-sm font-medium shadow-md transform hover:-translate-y-1 transition">Accept</button>
                                </form>
                                <form method="POST" action="{{ route('invitation.decline') }}">
                                    @csrf
                                    <input type="hidden" name="invitation_id" value="{{ $invitation->id }}">
                                    <button type="submit" class="text-red-800 hover:text-red-600 p-2 rounded-md text-xs font-medium">Decline</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="w-full flex flex-col justify-center px-8 mb-3">
                    <h2 class="text-gray-500 font-semibold">You have no invitations</h2>
                </div>
            @endif

        </div>

    </div>
</div>
