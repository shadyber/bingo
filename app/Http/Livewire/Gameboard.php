<?php

namespace App\Http\Livewire;

use App\Models\Card;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Gameboard extends Component
{
    protected $listeners = ['nextCall','togglePause'];

    public  $audioUrl, $random_number_array, $call_index=0, $call_history, $selected_cards, $selected_card, $card_to_check_id,$card_to_check, $game,$isBingo=false, $paused = true , $search;

    public function togglePause() {
        $this->paused = !$this->paused;

    }


    public function stopTimer(){
        $this->paused=true;
        $this->dispatchBrowserEvent('stopTimer');

    }
    public function getReady() {
        $this->playAudio(asset('/assets/audio/chimes/chime.mp3'));

    }


    public  function searchCard()
    {

        $this->selected_card = Card::agentCards()->where('card_name', $this->search)->last();

        if ($this->selected_card != null && $this->selected_card != '[]') {
            $this->card_to_check_id = $this->selected_card->id;

        } else {
            $this->card_to_check_id = null;

        }

$this->checkBingo(json_decode($this->selected_card->numbers));
    }


    function checkBingo($bingoCard) {

        $this->paused=true;
        // Check rows
$this->card_to_check=$bingoCard;
 $calledNumbers=$this->call_history;

         foreach ($bingoCard as $row) {
             if (count(array_intersect($row, $calledNumbers)) === 5)
             {
                 $this->isBingo = true;
$this->playAudio(asset('/assets/audio/chimes/winner.ogg'));
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
                $this->playAudio(asset('/assets/audio/chimes/winner.ogg'));
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
            $this->playAudio(asset('/assets/audio/chimes/winner.ogg'));
          return true;
        }
        $this->isBingo = false;
        $this->playAudio(asset('/assets/audio/chimes/notwinner.ogg'));
        return false;
    }



     public function playAudio($url){
       //  $this->audioUrl = asset('/assets/audio/chimes/'.$this->random_number_array[$this->call_index].'.ogg');// Construct the URL based on the random number
$this->audioUrl=$url;
         // Dispatch the browser event with the audio URL
         $this->dispatchBrowserEvent('playAudio', ['url' => $this->audioUrl]);

     }


public function nextCall(){

        if(!$this->paused && $this->call_index<75){

            $this->call_index++;
            $this->call_history[]=$this->random_number_array[$this->call_index];
$this->playAudio(asset('/assets/audio/chimes/'.$this->random_number_array[$this->call_index].'.ogg'));

        }

}


    public function mount()
    {


        // get generated random numbers
        $this->selected_cards=session()->get('selected_cards',[]);
        $this->random_number_array=  session()->get('random_numbers', []);



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
    }
        // Dispatch the browser event with the audio URL

        return view('livewire.gameboard');
    }
}
