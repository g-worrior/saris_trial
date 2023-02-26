<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class GetRoles extends Component
{
    public $roles;

    public function mount()
    {
        $this->roles = Role::all();
    }
    public function render()
    {
        return view('livewire.get-roles');
    }
}
