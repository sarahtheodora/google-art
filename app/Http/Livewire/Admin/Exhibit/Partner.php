<?php

namespace App\Http\Livewire\Admin\Exhibit;

use App\Models\Exhibit;
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
    public $exhibitName, $exhibitYear, $exhibitBackground, $exhibitDescription;

    public function render()
    {
        $partners = ModelsPartner::where('country_id', '=', $this -> countryId)->where('name', 'like', '%'.$this -> searchPartner.'%')->simplePaginate(5);
        return view('livewire.admin.exhibit.partner', [
            'partners' => $partners
        ]);
    }

    public function pilih($id)
    {
        $this -> countryId = $id;
    }

    public function closeModals()
    {
        $this -> partnerId = 0;
    }

    public function pilihPartner($id)
    {
        $this->emit('pilihPartner', $id);
    }

    public function tambah($id)
    {
        $this -> partnerId = $id;
    }

    public function simpan($id)
    {
        Exhibit::create([
            'name' => $this -> exhibitName, 
            'partner_id' => $id, 
            'year' => $this -> exhibitYear, 
            'description' => $this -> exhibitDescription, 
            'country_id' => $this -> countryId, 
            'background' => $this -> exhibitBackground
        ]);
        $this -> partnerId = 0;
        $this -> exhibitName = NULL;
        $this -> exhibitYear = NULL;
        $this -> exhibitBackground = NULL;
        $this -> exhibitDescription = NULL;
    }
}
