<?php

namespace App\Http\Livewire;

use App\Models\Card;
use Livewire\Component;

class BingoCardChecker extends Component
{

    public $card_names, $card_ids , $search , $selected_card_id, $selected_card=null;



    public  function searchCard()
    {

        $this->selected_card = Card::agentCards()->where('card_name', $this->search)->last();

        if ($this->selected_card != null && $this->selected_card != '[]') {
            $this->selected_card_id = $this->selected_card->id;
        } else {
            $this->selected_card_id = null;
            return;
        }


    }
    public function render()
    {
        return view('livewire.bingo-card-checker');
    }
}
