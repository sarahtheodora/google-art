<?php

namespace App\Http\Livewire\Admin\Asset;

use App\Models\Asset;
use Livewire\Component;

class Collection extends Component
{
    public $categoryId = 0;
    public $partnerId = 0;
    public $countryId = 0;
    protected $listeners = ['pilihCategory', 'pilihPartner', 'pilihCountry', 'restore' => '$refresh'];

    public function render()
    {
        $collections = Asset::where('category_id', '=', $this -> categoryId)->get();
        return view('livewire.admin.asset.collection', [
            'collections' => $collections
        ]);
    }

    public function pilihCategory($id)
    {
        $this -> categoryId = $id;
    }
    public function pilihPartner($id)
    {
        $this -> partnerId = $id;
    }

    public function pilihCountry($id)
    {
        $this -> countryId = $id;
    }
}
