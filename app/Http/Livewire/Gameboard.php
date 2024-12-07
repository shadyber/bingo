<?php

namespace App\Http\Livewire;

use App\Models\Card;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Gameboard extends Component
{
    protected $listeners = ['runAuto','openModal', 'closeModal'];
    public  $audioUrl, $random_number_array, $call_index=0, $call_history, $selected_cards, $game,$selected_card_id,$isBingo, $auto_call=false,$game_begin=false;
    public $isOpen = false;

    public function openModal()
    {
        $this->isOpen = true;
    }
    public function closeModal()
    {
        $this->isOpen = false;
    }
    function checkBingo($bingoCard) {
        // Check rows

        $calledNumbers=$this->call_history;
         foreach ($bingoCard as $row) {
             if (count(array_intersect($row, $calledNumbers)) === 5)
             {
                 $this->isBingo = true;

                 $this->emit('openModal');
                 return true;
             }
         }
         // Check columns

        for ($col = 0; $col < 5; $col++)
        {
            $column = array_column($bingoCard, $col);
            if (count(array_intersect($column, $calledNumbers)) === 5)
            {
                $this->isBingo = true;

                $this->emit('openModal');
                return true;
            }
        }
        // Check diagonals
        $diagonal1 = []; $diagonal2 = [];
        for ($i = 0; $i < 5; $i++)
        {
            $diagonal1[] = $bingoCard[$i][$i];
            $diagonal2[] = $bingoCard[$i][4 - $i];
        }
        if (count(array_intersect($diagonal1, $calledNumbers)) === 5 || count(array_intersect($diagonal2, $calledNumbers)) === 5)
        {

            $this->isBingo = true;


            $this->emit('openModal');
            return true;
        }
        $this->isBingo = false;

        return false;
    }



    public function runAuto() {
        $this->auto_call=true;
       $this->emit($this->nextCall());
     }

     public function beginGame(){

        $this->call_index=0;
        $this->emit('playAudio');
        $this->game_begin=true;



     }
     public function playAudio(){
         $this->audioUrl = asset('/assets/audio/chimes/'.$this->random_number_array[$this->call_index].'.ogg');// Construct the URL based on the random number

         // Dispatch the browser event with the audio URL
         $this->dispatchBrowserEvent('playAudio', ['url' => $this->audioUrl]);

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
