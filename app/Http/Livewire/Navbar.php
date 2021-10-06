<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        $admin = [
            'country' => [
                'title' => 'Country',
                'route' => 'admin.country'
            ],
            'entity' => [
                'title' => 'Entity',
                'route' => 'admin.entity'
            ],
            'partner' => [
                'title' => 'Partner',
                'route' => 'admin.partner'
            ],
            'exhibit' => [
                'title' => 'Exhibit',
                'route' => 'admin.exhibit'
            ],
            'asset' => [
                'title' => 'Asset',
                'route' => 'admin.asset'
            ],
        ];
        return view('livewire.navbar', [
            'admins' => $admin
        ]);
    }
}
