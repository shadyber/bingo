<?php

namespace App\Http\Livewire;

use App\Models\Card;
use App\Models\Game;
use Illuminate\Http\Request;
use Livewire\Component;

class CardDropdownSearch extends Component
{
    public $card_names, $card_ids , $search , $selected_card_id, $selected_card=null;



    public function togglecard($card_id){

        // confirm game state before addisng a card to list
        if(Game::getGameState()=="started")
        {
          //error

        }else{
            $card=Card::find($card_id);
            $card->is_active=!$card->is_active;
            $card->save();

            $selected_cards=Card::activeCardsByAgent();
            // is card allowed on game in progress
            session()->put('selected_cards',$selected_cards);
        }
        return redirect(request()->header('Referer'));
    }



    public  function searchCard(){

        $this->selected_card=Card::agentCards()->where('card_name',$this->search)->last();

if($this->selected_card!=null && $this->selected_card!='[]'){
    $this->selected_card_id=$this->selected_card->id;
}else{
    $this->selected_card_id=null;
    return;
}



     $this->togglecard($this->selected_card_id);


    }

    public function render()
    {

        return view('livewire.card-dropdown-search');

    }

}
