<?php

namespace App\Http\Livewire;

use App\Models\Card;
use App\Models\Game;
use Illuminate\Http\Request;
use Livewire\Component;

class CardToggller extends Component
{

    public $card_id=null, $cardhjkjkl;


    public function togglecard(){

        if(Game::getGameState()=="started")
        {
          //message error
        }else{
            $card=Card::find($this->card_id);
            $card->is_active=!$card->is_active;
            $card->save();

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
