<div>
    <div class="card p-2 m-2 space-y-1">
        @if(\App\Models\Agent::isActive(\Illuminate\Support\Facades\Auth::user()->id))
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

        <label for="game_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Game Type</label>
        <select id="game_type" required name="game_type"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">Select Game Type </option>
            <option selected value="0.05">Type 1 (5%)</option>
            <option value="0.1">Game Type 2 ( 10%)</option>
            <option value="0.15">Game Type 3 ( 15%)</option>
            <option value="0.2">Game Type 4 (20%)</option>
            <option value="0.25">Game Type 5( 25%)</option>
            <option value="0.3">Game Type 6 (30%)</option>
            <option value="0.35">Game Type 7( 35%)</option>
            <option value="0.4">Game Type 8 (40%)</option>
            <option value="0.45">Game Type 9(45%)</option>
            <option value="0.5">Game Type 10 (50%)</option>
        </select>


        <label for="card_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Card Price</label>
        <select id="card_price" required name="card_price"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

            <option  value="">Card Price </option>
            <option  value="5">5 Birr </option>
            <option  value="10">10 Birr </option>
            <option value="20">20 Birr</option>
            <option value="30">30 Birr</option>
            <option value="40">40 Birr </option>
            <option value="50">50 Birr</option>
            <option value="70">60 Birr</option>
            <option value="70">70 Birr</option>
            <option value="80">80 Birr</option>
            <option value="90">90 Birr</option>
            <option value="100">100 Birr</option>
            <option value="200">200 Birr</option>
            <option value="300">300 Birr</option>
            <option value="400">400 Birr</option>
            <option value="500">500 Birr</option>
            <option value="1000">1000 Birr</option>
        </select>







            <div class="mb-3 form-group">
                <button class="btn btn-lg btn-warning " type="submit"> Start New Game</button>
            </div>
        </form>
    @else
        <a href="/card" class="btn btn-lg btn-danger btn-outline-dark" >Manage Cards </a>
    @endif
    @else
        Your account is not active please contact main office
    @endif
</div>


<script>

</script>
