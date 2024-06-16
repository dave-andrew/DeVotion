<div x-show="pos==2" class="relative flex flex-col flex-grow py-4 px-8">

    @foreach($workspace->invitations as $invitation)
    <div>
        {{$invitation->invitedBy->username}}
    </div>
    @endforeach

</div>
