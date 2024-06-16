<div x-cloak x-show="invitations" x-on:click="invitations=false"
     class="z-50 fixed inset-0 min-w-screen min-h-screen flex justify-center items-center bg-black bg-opacity-50">
    <div @click.stop
         class="z-50 bg-white max-w-3xl w-full max-h-96 h-full m-auto flex flex-col py-4 rounded-lg text-black">
        <div class="w-full flex flex-col justify-center px-8 mb-3">

            <h1 class="text-lg font-bold">Invitations</h1>
            @if(Auth::user()->invitations->count() > 0)
                <div class="w-full flex flex-col justify-center px-8 mb-3">

                    <h2 class="text-gray-500 font-semibold">You have {{ Auth::user()->invitations->count() }} invitations</h2>

                    @foreach(Auth::user()->invitations as $invitation)
                        <div class="flex items">
                            <div class="flex w-full py-4">
                                <img src="data:image/jpeg;base64,{{ $invitation->workspace->image }}" alt="{{ $invitation->workspace->name }}" />
                                <div class="flex flex-col ml-4">
                                    <h1 class="text-gray-500 font-semibold">{{ $invitation->workspace->name }}</h1>
                                    <h2 class="text-gray-500 font-semibold">{{ $invitation->invitedBy->username }}</h2>
                                </div>
                            </div>
                            <div class="flex items-center w-1/2 gap-2">
                                <form method="POST" action="{{route('invitation.accept')}}">
                                    @csrf
                                    <input type="hidden" name="invitation_id" value="{{ $invitation->id }}">
                                    <button type="submit" class="bg-blue-500 p-2 rounded-md text-white text-xs font-medium">Accept</button>
                                </form>
                                <form method="POST" action="{{route('invitation.decline')}}">
                                    @csrf
                                    <input type="hidden" name="invitation_id" value="{{ $invitation->id }}">
                                    <button type="submit" class="bg-red-500 p-2 rounded-md text-white text-xs font-medium">Decline</button>
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
