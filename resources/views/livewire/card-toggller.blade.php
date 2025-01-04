<div>
    <input type="hidden" name="card_id" value="{{$card->id}}">



    @if($card->is_active==0)
        <div class=" border border-gray-200 rounded-lg bg-gray-200 text-gray-900 m-2" style="height: 65px"    wire:loading.class.add="bg-gray-400">
            <button class="btn w-full" style="height: 64px;" wire:click="togglecard"> {{$card->card_name}}</button>
        </div>

    @else
        <div class=" border border-gray-200 rounded-lg  bg-blue-500 text-gray-900 m-2" style="height: 65px">

            <button class="btn w-full" style="height: 64px;"  wire:click="togglecard"    wire:loading.class.add="bg-gray-300"> {{$card->card_name}}</button>
        </div>
    @endif
</div>
