<?php

namespace App\Http\Livewire;

use App\Models\Card;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Gameboard extends Component
{
    protected $listeners = ['runAuto'];
    public $random_number_array, $call_index=0, $call_history, $selected_cards, $game, $card_to_check, $selected_card_id;



    public function showModal() {
    $this->card_to_check=Card::where('id',$this->selected_card_id)->get();
        $this->dispatchBrowserEvent('show-modal');

    }
    public function hideModal() { $this->dispatchBrowserEvent('hide-modal'); }

    public function runAuto() {
        // Your method logic here // For example: $this->doSomething();
       $this->emit($this->nextCall());
     }



public function nextCall(){

        if($this->call_index>=74){
           $this->call_index=74;

        }else{
            $this->call_index++;
            $this->call_history[]=$this->random_number_array[$this->call_index];
            //  $this->dispatchBrowserEvent('play-audio', ['url' => '/assets/audio/chimes/chime.mp3']);
        }







}




    public function mount()
    {


        // get generated random numbers
        $this->selected_cards=session()->get('selected_cards',[]);
        $this->random_number_array=  session()->get('random_numbers', []);


        $this->call_index=0;
        $this->call_history=[];
        $this->call_history[]=$this->random_number_array[$this->call_index];

        //else goto cards




    }


    public function render()
    {
        $this->game=Game::lastActiveGame();
        if($this->game==null){
        // get generated random numbers
       $this->redirect("/card");
    }

          return view('livewire.gameboard');
    }
}
