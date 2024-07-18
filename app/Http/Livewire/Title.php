<?php

namespace App\Http\Livewire;

use App\Events\NoteEdit;
use App\Models\Note;
use Livewire\Component;

class Title extends Component
{
    public $note;
    public $title;
    private $count = 0;
    public $listeners = ['note-edit' => 'update'];

    public function update($note)
    {
        if ($this->count == 0) {
            $id = $note['id'];
            $this->title = $note['title'];
            $this->note = Note::find($id);
        }else{
            $this->count = 0;
        }
    }

    public function mount($note)
    {
        $this->note = $note;
        $this->title = $note->title;
    }

    public function onChange()
    {
        $this->note->title = $this->title;
        $this->note->save();
        $this->count = 1;
        NoteEdit::dispatch($this->note, auth()->user());
    }

    public function render()
    {
        return view('livewire.title');
    }
}
