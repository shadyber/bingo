<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GameControll extends Component
{
    public $game_type=1,$card_price=10;

    public function render()
    {
        return view('livewire.game-controll');
    }
}
