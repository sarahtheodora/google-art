<?php

namespace App\Http\Livewire\GoogleArt;

use App\Models\Partner as ModelsPartner;
use Livewire\Component;

class Partner extends Component
{
    public $partnerId;
    public function render()
    {
        $partners = ModelsPartner::select('countries.name as country', 'partners.logo', 'partners.name', 'partners.thumbnail', 'partners.description')
        ->join('countries', 'countries.id', '=', 'partners.country_id')
        ->where('partners.id', '=', $this -> partnerId)
        ->get();
        return view('livewire.google-art.partner', [
            'partner' => json_decode($partners)
        ]);
    }
}
