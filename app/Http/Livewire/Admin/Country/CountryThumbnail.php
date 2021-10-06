<?php

namespace App\Http\Livewire\Admin\Country;

use App\Models\Country;
use Livewire\Component;
use Livewire\WithPagination;

class CountryThumbnail extends Component
{
    use WithPagination;

    protected $listeners = [
        'restored' => '$refresh',
        'thumbnailAdded' => '$refresh'
    ];

    public $countryId = 0;
    public $countryName, $countryThumbnail;

    public $searchCountryThumbnail;

    protected $queryString = ['searchCountryThumbnail'];

    public function render()
    {
        $countries = Country::where('thumbnail', '!=', '')->where('name', 'like', '%'.$this -> searchCountryThumbnail.'%')->simplePaginate(5);
        return view('livewire.admin.country.country-thumbnail', [
            'countries' => $countries
        ]);
    }

    public function hapus($id)
    {
        /*
        update countries set deleted_at = waktu sekarang
        */
        $hapus = Country::find($id);
        $hapus -> delete();
        $this->emit('deleted');
    }

    public function detail($id)
    {
        $this -> countryId = $id;
        $country = Country::find($id);
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
        /*
        update countries set thumbnail =  $this -> countryThumbnail where id = $id
        */
        $country = Country::find($id);
        $country -> thumbnail = $this -> countryThumbnail;
        $country -> save();
        $this -> countryId = 0;
        $this -> countryName = NULL;
        $this -> countryThumbnail = NULL;
        $this->emit('thumbnailAdded');
    }
}
