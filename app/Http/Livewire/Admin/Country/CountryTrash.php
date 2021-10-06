<?php

namespace App\Http\Livewire\Admin\Country;

use App\Models\Country;
use Livewire\Component;
use Livewire\WithPagination;

class CountryTrash extends Component
{
    use WithPagination;
    
    protected $listeners = ['deleted' => '$refresh'];

    public $searchCountryTrash;

    protected $queryString = ['searchCountryTrash'];

    public function render()
    {
        $countries = Country::onlyTrashed()->where('name', 'like', '%'.$this -> searchCountryTrash.'%')->simplePaginate(5);
        return view('livewire.admin.country.country-trash', [
            'countries' => $countries
        ]);
    }

    public function kembali($id)
    {
        /*
        update countries set deleted_at = NULL where id = $id
        */
        $country = Country::onlyTrashed()->find($id);
        $country -> restore();
        $this->emit('restored');
    }
}
