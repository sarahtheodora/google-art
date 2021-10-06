<?php

namespace App\Http\Livewire\GoogleArt;

use App\Models\Entity as ModelsEntity;
use Livewire\Component;

class Entity extends Component
{
    public $countryId;
    public function render()
    {
        $entity = ModelsEntity::select('countries.name', 'entities.description', 'entities.background')
        ->join('countries', 'countries.id', '=', 'entities.country_id')
        ->where('entities.country_id', '=', $this -> countryId)
        ->get();

        return view('livewire.google-art.entity', [
            'entity' => json_decode($entity)
        ]);
    }
}
