<div>


    @if($card->is_active==0)
        <div class=" border border-gray-200 rounded-lg bg-gray-200 text-gray-900 m-2" style="height: 65px" >
            <div id="loadingAnimation" class="hidden"  wire:loading.class.remove="hidden" >Loading...</div>
            <button class="btn w-full" style="height: 64px;" wire:click="togglecard"> {{$card->card_name}}</button>
        </div>

    @else
        <div class=" border border-gray-200 rounded-lg  bg-blue-500 text-gray-900 m-2" style="height: 65px">
            <div id="loadingAnimation" class="hidden"  wire:loading.class.remove="hidden" > Loading...</div>
            <button class="btn w-full" style="height: 64px;"  wire:click="togglecard"  > {{$card->card_name}}</button>
        </div>
    @endif
</div>
