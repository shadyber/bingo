<div class="d-flex">
    <label for="cards">Select a Cards:</label>
    <input type="text" id="cards" list="cardList"  wire:model="search" >
    <datalist id="cardList">
        <select class="form-control" wire:model="selectedOption">
            @foreach ($filteredOptions as $option)
                <option value="{{ $option['id'] }}"> {{ $option['name'] }} </option>
            @endforeach
        </select>
    </datalist>
</div>
