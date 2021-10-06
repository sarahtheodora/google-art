<?php

namespace App\Http\Livewire\Admin\Exhibit;

use App\Models\Country as ModelsCountry;
use Livewire\Component;
use Livewire\WithPagination;

class Country extends Component
{
    use WithPagination;

    public $searchCountry;

    protected $queryString = ['searchCountry'];

    public $countryId = 0;
    public $countryName;
    public $partnerName, $partnerThumbnail, $partnerLogo, $partnerCityId, $partnerDescription;
    
    public function render()
    {
        $countries = ModelsCountry::where('thumbnail', '!=', '')->where('name', 'like', '%'.$this -> searchCountry.'%')->simplePaginate(5);
        return view('livewire.admin.exhibit.country', [
            'countries' => $countries
        ]);
    }

    public function pilih($id)
    {
        $this->emit('pilih', $id);
    }
}
