<?php

namespace App\Http\Livewire;

use App\Events\NoteEdit;
use App\Models\Note;
use Livewire\Component;

class Title extends Component
{
    public $note;
    public $title;

    public $listeners = ['note-edit' => 'update'];

    public function update($note)
    {
        $id = $note['id'];
        $this->title = $note['title'];
        $this->note = Note::find($id);
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
        NoteEdit::dispatch($this->note);
    }

    public function render()
    {
        return view('livewire.title');
    }
}
