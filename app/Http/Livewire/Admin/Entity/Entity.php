<?php

namespace App\Http\Livewire\Admin\Entity;

use App\Models\Country;
use App\Models\Entity as ModelsEntity;
use Livewire\Component;
use Livewire\WithPagination;

class Entity extends Component
{
    use WithPagination;

    public $countryId = 0;
    public $entityBackground, $entityDescription;
    public $countryName;

    public $searchEntity;

    protected $queryString = ['searchEntity'];

    public function render()
    {
        $entity = Country::
        select('countries.id','countries.name','entities.background')
        ->leftJoin('entities','entities.country_id','=','countries.id')
        ->where('countries.thumbnail','!=','')
        ->whereNull('entities.background')
        ->where('countries.name', 'like', '%'.$this->searchEntity.'%')
        ->simplePaginate(5);
        return view('livewire.admin.entity.entity', [
            'entities' => $entity
        ]);
    }

    public function detail($id)
    {
        $this -> countryId = $id;
        $country = Country::find($id);
        $entity = ModelsEntity::find($id);
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
        $ada = ModelsEntity::find($id);
        if ($ada) {
            $ada -> background = $this -> entityBackground;
            $ada -> description = $this -> entityDescription;
            $ada -> save();

        }else{
            ModelsEntity::create([
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
