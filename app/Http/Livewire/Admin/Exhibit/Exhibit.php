<?php

namespace App\Http\Livewire\Admin\Exhibit;

use App\Models\Exhibit as ModelsExhibit;
use Livewire\Component;
use Livewire\WithPagination;

class Exhibit extends Component
{
    use WithPagination;
    protected $listeners = ['pilihPartner', 'restore' => '$refresh'];
    public $partnerId = 0;
    public $exhibitId = 0;
    public $exhibitName, $exhibitYear, $exhibitBackground, $exhibitDescription;

    public function render()
    {
        $exhibits = ModelsExhibit::where('partner_id', '=', $this -> partnerId)->simplePaginate(5);
        return view('livewire.admin.exhibit.exhibit', [
            'exhibits' => $exhibits
        ]);
    }

    public function pilihPartner($id)
    {
        $this -> partnerId = $id;
    }

    public function detail($id)
    {
        $this -> exhibitId = $id;
        $exhibit = ModelsExhibit::find($id);
        $this -> exhibitName = $exhibit -> name;
        $this -> exhibitYear = $exhibit -> year;
        $this -> exhibitBackground = $exhibit -> background;
        $this -> exhibitDescription = $exhibit -> description;
        $this -> exhibitCountryId = $exhibit -> country_id;
    }

    public function simpan($id)
    {
        $this -> exhibitId = $id;
        $exhibit = ModelsExhibit::find($id);
        $exhibit -> name = $this -> exhibitName;
        $exhibit -> year = $this -> exhibitYear;
        $exhibit -> background = $this -> exhibitBackground;
        $exhibit -> description = $this -> exhibitDescription;
        $exhibit -> save();
        $this -> exhibitId = 0;
        $this -> exhibitName = NULL;
        $this -> exhibitYear = NULL;
        $this -> exhibitBackground = NULL;
        $this -> exhibitDescription = NULL;
    }
    public function closeModals()
    {
        $this -> exhibitId = 0;
        $this -> exhibitName = NULL;
        $this -> exhibitYear = NULL;
        $this -> exhibitBackground = NULL;
        $this -> exhibitDescription = NULL;
    }

    public function hapus($id)
    {
        $exhibit = ModelsExhibit::find($id);
        $exhibit -> delete();
        $this->emit('deleted');
    }
}
