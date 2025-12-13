<?php

namespace App\Livewire\Users;

use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class CreateOrUpdateUser extends Component
{
    #[Locked]
    public $id = null;
    public $name = '';
    public $email = '';
    public $visible = true;

    public function render()
    {
        return view('livewire.users.create-or-update-user');
    }
    #[On('open-user-form')]
    public function showModal(?int $id = null){
        $this->reset(['name', 'email', 'id']);
        $this->id = $id;
        $this->visible = true;
    }
}
