<?php

namespace App\Events;

use App\Http\Livewire\NoteDetail;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NoteDetailEdit implements ShouldBroadcast
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
//        dd('note-detail-edit.'.$this->notedetail->id);
        return new Channel('note-detail-edit.'.$this->notedetail->id);
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'notedetail' => $this->notedetail,
        ];
    }

    /**
     * Get the data to broadcast.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'note-detail-edit';
    }
}
