<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NoteEdit implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $note;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($note)
    {
        $this->note = $note;
    }

    public function broadcastWith()
    {
        return [
            'note' => $this->note,
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('note-edit-channel.'.$this->note->id);
    }

    /**
     * Get the data to broadcast.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'note-edit';
    }
}
