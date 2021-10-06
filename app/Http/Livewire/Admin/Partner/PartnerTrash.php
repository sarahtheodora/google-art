<?php

namespace App\Http\Livewire\Admin\Partner;

use App\Models\Partner;
use Livewire\Component;
use Livewire\WithPagination;

class PartnerTrash extends Component
{
    use WithPagination;
    protected $listeners = ['deleted' => '$refresh'];
    public $searchTrash;
    protected $queryString = ['searchTrash'];
    public function render()
    {
        $partners = Partner::onlyTrashed()->where('name', 'like', '%'.$this -> searchTrash.'%')->simplePaginate(5);
        return view('livewire.admin.partner.partner-trash', [
            'partners' => $partners
        ]);
    }
    public function kembalikan($id)
    {
        $partner = Partner::onlyTrashed()->find($id);
        $partner -> restore();
        $this->emit('restored');
    }
}
