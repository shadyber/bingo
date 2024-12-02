<?php

namespace App\Http\Livewire;

use App\Models\Card;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Gameboard extends Component
{
    protected $listeners = ['runAuto'];
    public  $audioUrl, $random_number_array, $call_index=0, $call_history, $selected_cards, $game, $card_to_check, $selected_card_id, $auto_call=true;




    public function showModal() {
    $this->card_to_check=Card::where('id',$this->selected_card_id)->get();
        $this->dispatchBrowserEvent('show-modal');

    }
    public function hideModal() { $this->dispatchBrowserEvent('hide-modal'); }

    public function runAuto() {

       $this->emit($this->nextCall());
     }



public function nextCall(){

    if($this->call_index>=74){
           $this->call_index=74;

        }else{
            $this->call_index++;
            $this->call_history[]=$this->random_number_array[$this->call_index];
            //  $this->dispatchBrowserEvent('play-audio', ['url' => '/assets/audio/chimes/chime.mp3']);
        // Your method logic here // For example: $this->doSomething();
        $this->audioUrl = asset('/assets/audio/chimes/'.$this->random_number_array[$this->call_index].'.ogg');// Construct the URL based on the random number

        // Dispatch the browser event with the audio URL
        $this->dispatchBrowserEvent('playAudio', ['url' => $this->audioUrl]);

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

        $this->audioUrl = asset('/assets/audio/chimes/'.$this->random_number_array[$this->call_index].'.ogg');// Construct the URL based on the random number

        $this->dispatchBrowserEvent('playAudio');
  //else goto cards




    }
 

    public function render()
    {
        $this->game=Game::lastActiveGame();
        if($this->game==null){
        // get generated random numbers
       $this->redirect("/newgame");
    }    // Dispatch the browser event with the audio URL
        $this->audioUrl = asset('/assets/audio/chimes/'.$this->random_number_array[$this->call_index].'.ogg');// Construct the URL based on the random number

        $this->dispatchBrowserEvent('playAudio', ['url' => $this->audioUrl]);


        return view('livewire.gameboard');
    }
}
