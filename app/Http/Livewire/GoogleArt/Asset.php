<?php

namespace App\Http\Livewire\GoogleArt;

use App\Models\Asset as ModelsAsset;
use Livewire\Component;

class Asset extends Component
{
    public $assetId;
    public function render()
    {
        $asset = ModelsAsset::select('assets.id','assets.name','assets.thumbnail','assets.details','countries.name AS country','cities.name AS city','partners.name AS partner','partners.logo')
        ->leftJoin('countries','countries.id','=','assets.country_id')
        ->leftJoin('partners','partners.id','=','assets.partner_id')
        ->leftJoin('cities','cities.id','=','partners.city_id')
        ->where('assets.id', '=', $this -> assetId)
        ->get();
        return view('livewire.google-art.asset', [
            'asset' => json_decode($asset)
        ]);
    }
}
