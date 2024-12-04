<div>
    <hr>
    Select Game Type


    <div class="card p-2 m-2 space-y-1">
        <div class="card-title"><h2>Select Card</h2></div>
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
