<?php

namespace App\Http\Livewire\Admin\Asset;

use App\Models\Category as ModelsCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;
    protected $listeners = ['pilihPartner', 'pilihCountry', 'restore' => '$refresh'];
    public $partnerId = 0;
    public $countryId = 0;
    public function render()
    {
        $categories = ModelsCategory::where('partner_id', '=', $this -> partnerId)->simplePaginate(5);
        return view('livewire.admin.asset.category', [
            'categories' => $categories
        ]);
    }
    public function pilihPartner($id)
    {
        $this -> partnerId = $id;
    }

    public function pilihCountry($id)
    {
        $this -> countryId = $id;
    }

    public function pilihCategory($id)
    {
        $this->emit('pilihPartner', $this -> partnerId);
        $this->emit('pilihCategory', $id);
        $this->emit('pilihCountry', $this -> countryId);
    }
}
