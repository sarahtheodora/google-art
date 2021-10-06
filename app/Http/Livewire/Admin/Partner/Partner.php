<?php

namespace App\Http\Livewire\Admin\Partner;

use App\Models\Partner as ModelsPartner;
use Livewire\Component;
use Livewire\WithPagination;

class Partner extends Component
{
    use WithPagination;

    public $searchPartner;

    protected $queryString = ['searchPartner'];

    protected $listeners = [
        'pilih',
        'restored' => '$refresh'
    ];

    public $countryId = 0;
    public $partnerId = 0;
    public $partnerName, $partnerThumbnail, $partnerLogo, $partnerDescription;

    public function render()
    {
        $partners = ModelsPartner::where('country_id', '=', $this -> countryId)->where('name', 'like', '%'.$this -> searchPartner.'%')->simplePaginate(5);
        return view('livewire.admin.partner.partner', [
            'partners' => $partners
        ]);
    }

    public function pilih($id)
    {
        $this -> countryId = $id;
    }

    public function hapus($id)
    {
        $partner = ModelsPartner::find($id);
        $partner ->delete();
        $this->emit('deleted');
    }

    public function detail($id)
    {
        $this -> partnerId = $id;
        $partner = ModelsPartner::find($id);
        $this -> partnerLogo = $partner -> logo;
        $this -> partnerName = $partner -> name;
        $this -> partnerThumbnail = $partner -> thumbnail;
        $this -> partnerDescription = $partner -> description;
    }

    public function closeModals()
    {
        $this -> partnerId = 0;
    }

    public function simpan($id)
    {
        $partner = ModelsPartner::find($id);
        $partner -> logo = $this -> partnerLogo;
        $partner -> name = $this -> partnerName;
        $partner -> thumbnail = $this -> partnerThumbnail;
        $partner -> description = $this -> partnerDescription;
        $partner -> save();
        $this -> partnerId = 0;
        $this -> partnerLogo = NULL;
        $this -> partnerName = NULL;
        $this -> partnerThumbnail = NULL;
        $this -> partnerDescription = NULL;
    }
}
