<?php

namespace App\Http\Livewire;

use App\Models\Card;
use App\Models\Game;
use Illuminate\Http\Request;
use Livewire\Component;

class CardToggller extends Component
{

    public $card_id=null, $card;


    public function togglecard(){

        if(Game::getGameState()=="started")
        {
          //message error
        }else{
            $this->card->is_active=!$this->card->is_active;
            $this->card->save();

            $selected_cards=Card::activeCardsByAgent();
            // is card allowed on game in progress
            session()->put('selected_cards',$selected_cards);
        }
     //message

      //  return redirect()->back();
    }

public function mount($card_id){
 $this->card=Card::find($card_id);
 $this->card_id=$card_id;
}
    public function render()
    {
        return view('livewire.card-toggller');
    }
}
