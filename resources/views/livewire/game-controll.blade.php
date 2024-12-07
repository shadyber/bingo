<div>
    <hr>
    <form class="max-w-sm mx-auto">
        <label for="game_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Game Type</label>
        <select id="game_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected value="1">Type 1</option>
            <option value="2">Game Type 2</option>
            <option value="3">Game Type 3</option>
            <option value="4">Game Type 4</option>
            <option value="5">Game Type 5</option>
        </select>


        <label for="game_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Card Price</label>
        <select id="game_type" wire:model="game_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected value="{{$game_type}}">{{$game_type*10}} Birr </option>
            <option value="20">20 Birr</option>
            <option value="30">30 Birr</option>
            <option value="40">40 Birr </option>
            <option value="50">50 Birr</option>
        </select>



    </form>
    <div class="card p-2 m-2 space-y-1">
        <div class="card-title"><h2>Select Cards </h2></div>
        <div class="card-body">
            @if(\App\Models\Game::getGameState()!="started")

                <form action="toggelcard" method="post" class="form-inline" >
                    @csrf

                        <select name="card_id" id="card_to_select">
                            <option value="">Select Card</option>
                            @foreach(\App\Models\Card::agentCards() as $c)
                                <option value="{{$c->id}}"> {{$c->card_name}}</option>
                            @endforeach
                        </select>

                                    <button type="submit" class="btn btn-primary">
                                        Add
                                    </button>


                </form>

                <div class="row" id="cards">
                    @foreach(\App\Models\Card::agentCards() as $card)

                        <div class="col-md-2">


                            <div class=" border border-gray-200 rounded-lg  ">
                                <h3 class="text-2xl   font-semibold"> Card  : {{$card->card_name}}</h3>
                                <form action="toggelcard" method="post"
                                >

                                    @csrf
                                    <input type="hidden" name="card_id" value="{{$card->id}}">
                                    @if($card->is_active==0)
                                        <input type="checkbox" value=""  name="is_active">
                                        <button class="btn btn-sm btn-primary"> Add</button>
                                    @else
                                        <input type="checkbox" value=""  checked name="is_active">
                                        <button class="btn btn-sm btn-danger"> Remove</button>
                                    @endif


                                </form>


                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <hr>
    @if(count(\App\Models\Card::agentCards())>0&& \App\Models\Game::getGameState()!="started")
        <form class="max-w-sm mx-auto" action="newgame" method="post" >
            @csrf


            <div class="mb-3 form-group">
                <button class="btn btn-lg btn-warning "> Start New Game</button>
            </div>
        </form>

    @endif

</div>


<script>

</script>
