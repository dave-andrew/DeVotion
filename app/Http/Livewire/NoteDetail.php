<?php

namespace App\Http\Livewire;

use App\Events\NoteDetailEdit;
use Livewire\Component;

class NoteDetail extends Component
{
    public $contents;
    public $notedetail;

    public $listeners = ['note-edit' => 'update'];

    public function update($notedetail)
    {
        $notedetail = $notedetail[0];
        $id = $notedetail['id'];
        $this->contents = $notedetail['content'];
        $this->notedetail = \App\Models\Notedetail::find($id);
    }

    public function mount($notedetail)
    {
        $this->notedetail = $notedetail;
        $this->contents = $notedetail->content;
//        dd($this->contents);
    }

    public function onChange()
    {
        $this->notedetail->content = $this->contents;
        $this->notedetail->save();
        NoteDetailEdit::dispatch($this->notedetail);
    }

    public function render()
    {
        return view('livewire.note-detail');
    }
}
