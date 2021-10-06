<?php

namespace App\Http\Livewire\Admin\Asset;

use App\Models\Asset;
use App\Models\Category;
use Livewire\Component;

class CreateCollection extends Component
{
    public $categoryId = 0;
    public $partnerId = 0;
    public $countryId = 0;
    protected $listeners = ['pilihCategory', 'pilihPartner', 'pilihCountry'];
    public $collectionName, $collectionThumbnail, $collectionDetail;

    public function render()
    {
        $categoryName = Category::find($this -> categoryId);
        return view('livewire.admin.asset.create-collection', [
            'categoryName' => $categoryName
        ]);
    }

    public function pilihCategory($id)
    {
        $this -> categoryId = $id;
    }

    public function pilihPartner($id)
    {
        $this -> partnerId = $id;
    }

    public function pilihCountry($id)
    {
        $this -> countryId = $id;
    }

    public function simpan()
    {
        $collection = Asset::create([
            'name' => $this -> collectionName,
            'thumbnail' => $this -> collectionThumbnail,
            'country_id' => $this -> countryId,
            'partner_id' => $this -> partnerId,
            'category_id' => $this -> categoryId,
            'details' => $this -> collectionDetail
        ]);
        $this -> collectionName = NULL;
        $this -> collectionThumbnail = NULL;
        $this -> collectionDetail = NULL;
        $this->emit('restore');
    }
}
