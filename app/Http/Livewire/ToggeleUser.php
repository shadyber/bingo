<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ToggeleUser extends Component
{
    public $agent;

    public function toggleAgent(){
       $this->agent->is_active=!$this->agent->is_active;
       $this->agent->save();

       return;
}

public function mount($agent){
$this->agent=$agent;

}

    public function render()
    {
        return view('livewire.toggele-user');
    }
}
