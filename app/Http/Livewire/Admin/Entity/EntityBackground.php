<?php

namespace App\Http\Livewire\Admin\Entity;

use App\Models\Country;
use App\Models\Entity;
use Livewire\Component;
use Livewire\WithPagination;

class EntityBackground extends Component
{
    use WithPagination;

    protected $listeners = ['restored' => '$refresh'];

    public $countryId = 0;
    public $entityBackground, $entityDescription;
    public $countryName;

    public $searchEntityBackground;

    protected $queryString = ['searchEntityBackground'];
    
    public function render()
    {
        // $entity = Country::
        // where('countries.thumbnail', '!=', '')
        // ->where('countries.name', 'like', '%'.$this->searchEntityBackground.'%')
        // ->simplePaginate(5);

        $entity = Entity::
        select('countries.id', 'countries.name', 'entities.background', 'entities.background')
        ->join('countries', 'countries.id', '=', 'entities.country_id')
        ->where('countries.name', 'like', '%'.$this->searchEntityBackground.'%')
        ->simplePaginate(5);
        
        return view('livewire.admin.entity.entity-background', [
            'entities' => $entity
        ]);
    }

    public function hapus($id)
    {
        $hapus = Entity::find($id);
        $hapus -> delete();
        $this->emit('Entitydeleted');
    }

    public function detail($id)
    {
        $this -> countryId = $id;
        $country = Country::find($id);
        $entity = Entity::find($id);
        if ($entity) {
            $this -> entityBackground = $entity -> background;
            $this -> entityDescription = $entity -> description;
        }
        $this -> countryName = $country->name;
    }

    public function closeModals()
    {
        $this -> countryId = 0;
        $this -> countryName = NULL;
        $this -> entityBackground = NULL;
        $this -> entityDescription = NULL;
    }

    public function simpan($id)
    {
        $ada = Entity::find($id);
        if ($ada) {
            $ada -> background = $this -> entityBackground;
            $ada -> description = $this -> entityDescription;
            $ada -> save();

        }else{
            Entity::create([
                'country_id' => $this -> countryId,
                'background' => $this -> entityBackground,
                'description' => $this -> entityDescription
            ]);
        }
        $this -> countryId = 0;
        $this -> countryName = NULL;
        $this -> countryThumbnail = NULL;
    }
}
