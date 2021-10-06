<?php

namespace App\Http\Livewire\Admin\Entity;

use App\Models\Entity;
use Livewire\Component;
use Livewire\WithPagination;

class EntityTrash extends Component
{
    use WithPagination;
    
    protected $listeners = ['Entitydeleted' => '$refresh'];

    public $searchEntityTrash;

    protected $queryString = ['searchEntityTrash'];
    
    public function render()
    {
        $entities = Entity::
        select('countries.id', 'countries.name', 'entities.background', 'entities.background')
        ->onlyTrashed()
        ->join('countries', 'countries.id', '=', 'entities.country_id')
        ->where('countries.name', 'like', '%'.$this->searchEntityTrash.'%')
        ->simplePaginate(5);
        return view('livewire.admin.entity.entity-trash', [
            'entities' => $entities
        ]);
    }

    public function kembali($id)
    {
        $entity = Entity::onlyTrashed()->find($id);
        $entity -> restore();
        $this->emit('restored');
    }
}
