<?php

namespace App\Http\Livewire\Admin\Exhibit;

use App\Models\Exhibit;
use Livewire\Component;
use Livewire\WithPagination;

class Trash extends Component
{
    use WithPagination;

    protected $listeners = ['deleted' => '$refresh'];
    public $searchTrash;

    protected $queryString = ['searchTrash'];

    public function render()
    {
        $exhibits = Exhibit::where('name', 'like', '%'.$this -> searchTrash.'%')->onlyTrashed()->simplePaginate(5);
        return view('livewire.admin.exhibit.trash', [
            'exhibits' => $exhibits
        ]);
    }

    public function kembali($id)
    {
        $exhibits = Exhibit::onlyTrashed()->find($id);
        $exhibits -> restore();
        $this->emit('restore');

    }
}
