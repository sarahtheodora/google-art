<?php

namespace App\Http\Livewire\Admin\Country;

use App\Models\Country as ModelsCountry;
use Livewire\Component;
use Livewire\WithPagination;

class Country extends Component
{
    use WithPagination;

    protected $listeners = [
        'restored' => '$refresh',
        'thumbnailAdded' => '$refresh'
    ];

    public $countryId = 0;
    public $countryName, $countryThumbnail;

    public $searchCountry;

    protected $queryString = ['searchCountry'];

    public function render()
    {
        $countries = ModelsCountry::where('thumbnail', '=', '')->where('name', 'like', '%'.$this -> searchCountry.'%')->simplePaginate(5);
        return view('livewire.admin.country.country', [
            'countries' => $countries
        ]);
    }

    public function hapus($id)
    {
        $hapus = ModelsCountry::find($id);
        $hapus -> delete();
        $this->emit('deleted');
    }

    public function detail($id)
    {
        $this -> countryId = $id;
        $country = ModelsCountry::find($id);
        $this -> countryName = $country->name;
        $this -> countryThumbnail = $country->thumbnail;
    }

    public function closeModals()
    {
        $this -> countryId = 0;
        $this -> countryName = NULL;
        $this -> countryThumbnail = NULL;
    }

    public function simpan($id)
    {
        $country = ModelsCountry::find($id);
        $country -> thumbnail = $this -> countryThumbnail;
        $country -> save();
        $this -> countryId = 0;
        $this -> countryName = NULL;
        $this -> countryThumbnail = NULL;
        $this->emit('thumbnailAdded');
    }
}
