<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CardDropdownSearch extends Component
{
    public $search = '';
    public $agent_cards;
    public $options =[

    ];
    public $selectedOption;

    public function getFilteredOptions() {
        return array_filter($this->options, fn($option) => stripos($option['name'], $this->search) !== false); }
    public function mount($agent_cards){
        $this->agent_cards=$agent_cards;
        foreach ($this->agent_cards as $car){
            $this->options[]=['id'=>$car->id,'name'=>$car->card_name];
        }


    }
    public function render()
    {
        $filteredOptions = $this->getFilteredOptions();
        return view('livewire.card-dropdown-search', ['filteredOptions' => $filteredOptions]);

    }

}
