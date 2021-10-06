<?php

namespace App\Http\Livewire\Admin\Asset;

use App\Models\Partner as ModelsPartner;
use Livewire\Component;
use Livewire\WithPagination;

class Partner extends Component
{
    use WithPagination;

    public $searchPartner;

    protected $queryString = ['searchPartner'];
    
    protected $listeners = ['pilih'];
    public $countryId = 0;
    public $partnerId = 0;
    
    public function render()
    {
        $partners = ModelsPartner::where('country_id', '=', $this -> countryId)->where('name', 'like', '%'.$this -> searchPartner.'%')->simplePaginate(5);
        return view('livewire.admin.asset.partner', [
            'partners' => $partners
        ]);
    }

    public function pilih($id)
    {
        $this -> countryId = $id;
    }

    public function pilihPartner($id)
    {
        $this->emit('pilihPartner', $id);
        $this->emit('pilihCountry', $this -> countryId);
    }
}
