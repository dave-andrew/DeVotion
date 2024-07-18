<?php

namespace App\Http\Livewire;

use App\Events\NoteDetailEdit;
use App\Events\NoteEdit;
use App\Models\Notedetail as ModelsNotedetail;
use Livewire\Component;

class NoteDetail extends Component
{
    public $content;
    public $detail;

    public $listeners = ['note-detail-edit' => 'update'];

    public function update($detail)
    {
        $id = $detail['id'];
        $this->content = $detail['content'];
        $this->detail = ModelsNotedetail::find($id);
    }

    public function mount($detail)
    {
        $this->content = $detail->content;
        $this->detail = $detail;
    }

    public function onChange()
    {
        $this->detail->content = $this->content;
        $this->detail->save();
        NoteDetailEdit::dispatch($this->detail);
    }

    public function render()
    {
        return view('livewire.note-detail');
    }
}
