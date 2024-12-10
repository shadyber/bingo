<?php

namespace App\Http\Livewire;

use App\Models\Agent;
use App\Models\User;
use Livewire\Component;

class AdminDashboard extends Component
{
    public $agents;

    public function mount(){
        $this->agents=Agent::all();
    }

    public function render()
    {
        return view('livewire.admin-dashboard');
    }
}
