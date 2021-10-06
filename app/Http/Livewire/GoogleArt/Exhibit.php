<?php

namespace App\Http\Livewire\GoogleArt;

use App\Models\Exhibit as ModelsExhibit;
use Livewire\Component;

class Exhibit extends Component
{
    public $exhibitId;
    public function render()
    {
        return view('livewire.google-art.exhibit', [
            'item' => json_decode(ModelsExhibit::
            select('exhibits.name', 'partners.name AS partner', 'exhibits.year', 'exhibits.description', 'exhibits.background', 'partners.logo')
            ->join('partners', 'partners.id', '=', 'exhibits.partner_id')
            ->where('exhibits.id', '=', $this -> exhibitId)->get())
        ]);
    }
}
