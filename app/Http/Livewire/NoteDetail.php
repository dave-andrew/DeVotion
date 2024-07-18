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
    public $count = 0;
    public $editable;

    public $listeners = ['note-detail-edit' => 'update'];

    public function update($detail)
    {
        if($this->count == 0){
            $id = $detail['id'];
            $this->content = $detail['content'];
            $this->detail = ModelsNotedetail::find($id);
        }else{
            $this->count = 0;
        }
    }

    public function mount($detail, $editable)
    {
        $this->editable = $editable;
        $this->content = $detail->content;
        $this->detail = $detail;
    }

    public function onChange()
    {
        $this->detail->content = $this->content;
        $this->detail->save();
        $this->count = 1;
        NoteDetailEdit::dispatch($this->detail);
    }

    public function render()
    {
        return view('livewire.note-detail');
    }
}
