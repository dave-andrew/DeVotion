<?php

namespace App\Http\Livewire;

use App\Events\NoteDetailEdit;
use Livewire\Component;

class NoteDetail extends Component
{
    public $contents = [];
    public $notedetails = [];

    public $listeners = ['note-edit' => 'update'];

    public function update($notedetail, $note)
    {
        foreach ($note['notedetails'] as $key => $detail) {
            $this->contents[$detail['id']] = $detail['content'];
            $this->notedetails[$key] = \App\Models\Notedetail::find($detail['id']);
        }
    }

    public function mount($note)
    {
        foreach ($note->notedetails as $detail) {
            $this->contents[$detail->id] = $detail->content;
            $this->notedetails[] = $detail;
        }
    }

    public function onChange($id)
    {
        $this->notedetails[array_search($id, array_column($this->notedetails, 'id'))]->content = $this->contents[$id];
        $this->notedetails[array_search($id, array_column($this->notedetails, 'id'))]->save();
        NoteDetailEdit::dispatch($this->notedetails[array_search($id, array_column($this->notedetails, 'id'))]);
    }

    public function render()
    {
        return view('livewire.note-detail');
    }
}
