<?php

namespace App\Http\Livewire\Admin\Partner;

use App\Models\City;
use App\Models\Country as ModelsCountry;
use App\Models\Partner;
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
        $cities = City::where('country_id', '=', $this -> countryId)-> get();
        return view('livewire.admin.partner.country', [
            'countries' => $countries,
            'cities' => $cities
        ]);
    }

    public function tambah($id)
    {
        $country = ModelsCountry::find($id);
        $this -> countryName = $country -> name;
        $this -> countryId = $id;
        
    }

    public function closeModals()
    {
        $this -> countryId = 0;
    }
    
    public function simpan($id)
    {
        Partner::create([
            'logo' => $this -> partnerLogo, 
            'name' => $this -> partnerName, 
            'country_id' => $this -> countryId, 
            'city_id' => $this -> partnerCityId, 
            'thumbnail' => $this -> partnerThumbnail, 
            'description' => $this -> partnerDescription
        ]);
        $this -> partnerLogo = NULL;
        $this -> partnerName = NULL;
        $this -> countryId = 0;
        $this -> partnerCityId = NULL;
        $this -> partnerThumbnail = NULL;
        $this -> partnerDescription = NULL;
        $this->emit('restored');
    }

    public function pilih($id)
    {
        $this->emit('pilih', $id);
    }
}
