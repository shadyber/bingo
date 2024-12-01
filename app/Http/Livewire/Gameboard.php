<?php

namespace App\Http\Livewire;

use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Gameboard extends Component
{
    protected $listeners = ['runAuto'];
    public $random_number_array, $call_index=0, $call_history, $selected_cards;


    public function runAuto() {
        // Your method logic here // For example: $this->doSomething();
       $this->emit($this->nextCall());
     }



public function nextCall(){
    $this->call_index++;
    $this->call_history[]=$this->random_number_array[$this->call_index];
    $this->dispatchBrowserEvent('play-audio', ['url' => '/assets/audio/chimes/chime.mp3']);


}


public function newGame(){
    $cards= Card::all();
    foreach ($cards as $card){
        $card->is_active=false;
        $card->save();
    }
    $this->call_history=[];
    $this->call_index=0;

 $this->redirect('/card');

}



    public function mount()
    {
        // get selected cards
        $this->selected_cards=session()->get('selected_cards',[]);
      $this->random_number_array=  session()->get('random_numbers', []);
        $this->call_index=0;
        $this->call_history=[];
        $this->call_history[]=$this->random_number_array[$this->call_index];
        // get generated random numbers
        //else goto cards




    }


    public function render()
    {

        return view('livewire.gameboard');
    }
}
