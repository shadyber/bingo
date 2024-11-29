<?php

namespace App\Http\Livewire;

use App\Models\Card;
use Livewire\Component;

class Gameboard extends Component
{


    public $random_number_array, $call_index=0, $call_history;


public function nextCall(){
    $this->call_index++;
    $this->call_history[]=$this->random_number_array[$this->call_index];



}
public function regeneraterandomarray(){
    $random_number_array = range(1, 75);
    shuffle($random_number_array );
    $this->random_number_array = array_slice($random_number_array ,0,75);
    $this->call_history[]=$this->random_number_array[0];
}

public function newGame(){
    $this->call_index=0;
    $this->call_history=[];
    $this->regeneraterandomarray();
   $cards= Card::all();
   foreach ($cards as $card){
       $card->is_active=false;
       $card->save();
   }
}

    public function mount()
    {
        $this->regeneraterandomarray();
    }


    public function render()
    {

        return view('livewire.gameboard');
    }
}
