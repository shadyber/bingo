<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Gameboard extends Component
{
    public $random_number_array, $call_index=0, $is_called=false;


public function nextCall(){
    $this->call_index++;

    
}
    public function render()
    {
        $random_number_array = range(1, 75);
        shuffle($random_number_array );
        $this->random_number_array = array_slice($random_number_array ,0,75);
        return view('livewire.gameboard');
    }
}
