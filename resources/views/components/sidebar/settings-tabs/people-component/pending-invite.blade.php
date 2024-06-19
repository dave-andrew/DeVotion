<div x-show="pos==2" class="relative flex flex-col flex-grow py-4 px-8">

    @if(@$workspace->invitations->isEmpty())
    <div class="flex justify-center text-gray-500">
        No pending invitations
    </div>
    @endif

    @foreach($workspace->invitations as $invitation)
    <div>
        {{$invitation->invitedBy->username}}
    </div>
    @endforeach

</div>
