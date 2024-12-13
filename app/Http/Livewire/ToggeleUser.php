<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ToggeleUser extends Component
{
    public $agent;

    public function toggleAgent(){
        if(Auth::user()->user_type=='admin'){
            $this->agent->is_active=!$this->agent->is_active;
            $this->agent->save();
        }

}

public function mount($agent){
$this->agent=$agent;

}

    public function render()
    {
        return view('livewire.toggele-user');
    }
}
