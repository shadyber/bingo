<?php

namespace App\Http\Livewire;

use App\Models\Card;
use Livewire\Component;

class GameControll extends Component
{
public  $agent_cards;

public function mount(){
    $this->cards=Card::agentCards();
}
    public function render()
    {
        return view('livewire.game-controll');
    }
}
