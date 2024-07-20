<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NoteDetailBlockEdit implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $notedetail;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($notedetail)
    {
        $this->notedetail = $notedetail;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('note-block-channel.'.$this->notedetail->id);
    }

    public function broadcastWith()
    {
        return [
            'notedetail' => $this->notedetail,
        ];
    }

    public function broadcastAs()
    {
        return 'note-block-edit';
    }
}
