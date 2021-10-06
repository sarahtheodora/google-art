<?php

namespace App\Http\Livewire\Admin\Asset;

use App\Models\Category;
use App\Models\Partner;
use Livewire\Component;

class CreateCategory extends Component
{
    protected $listeners = ['pilihPartner', 'restore' => '$refresh'];
    public $partnerId = 0;
    public $categoryName, $categoryThumbnail;

    public function render()
    {
        $partnerName = Partner::find($this -> partnerId);
        return view('livewire.admin.asset.create-category', [
            'partnerName' => $partnerName
        ]);
    }
    public function pilihPartner($id)
    {
        $this -> partnerId = $id;
    }
    
    public function simpan()
    {
        /*
        insert into 
            categories(name, partner_id, thumbnail)
        values
            ("$this -> categoryName", "$this -> partnerId", "$this -> categoryThumbnail")
        */
        Category::create([
            'name' => $this -> categoryName,
            'partner_id' => $this -> partnerId,
            'thumbnail' => $this -> categoryThumbnail
        ]);
        $this -> categoryName = NULL;
        $this -> categoryThumbnail = NULL;
        $this->emit('restore');
    }
}
