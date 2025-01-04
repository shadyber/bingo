<div class="inline col-md-3">

    <input type="hidden" name="selected_card_id" wire:model="selected_card_id">
    <input type="text" id="card_name"    wire:model="search" wire:keydown.enter="searchCard" >
    <button class="btn btn-sm btn-primary" wire:click="searchCard">Toggle</button>

</div>
