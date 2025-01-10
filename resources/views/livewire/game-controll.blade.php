<div>
    @if(\App\Models\Agent::isActive(\Illuminate\Support\Facades\Auth::user()->id))
        <div>
            <div class="row p-3 m-3">
                <div class="col-md-2 col-sm-12 col-lg-2"> Card Selection Form </div>
                <div class="col-md-3 col-sm-6 col-lg-3">
                    @livewire('card-dropdown-search')
                </div>
                <div class="col-md-3 col-sm-6 col-lg-3">

                    <form action="toggelcard" method="post" class="form-inline flex" >
                        @csrf



                        <select name="card_id" id="card_to_select" >
                            <option value="">Select Card</option>
                            @foreach(\App\Models\Card::agentCards() as $c)
                                <option value="{{$c->id}}"> {{$c->card_name}}</option>
                            @endforeach
                        </select>

                        <button type="submit" class="btn btn-primary">
                            Toggle
                        </button>


                    </form>
                </div>

            </div>

            <div class=row>
                @if(count(\App\Models\Card::agentCards())>0&& \App\Models\Game::getGameState()!="started")
                    <div class="col-md-12 col-sm-12 col-lg-10">
                        <form class="max-w-sm mx-auto" action="newgame" method="post" >
                            @csrf

                            <label for="game_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Game Type</label>
                            <select id="game_type" required name="game_type"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Select Game Type </option>
                                <option selected value="0.05">Type 1 </option>
                                <option value="0.1">Game Type 2 </option>
                                <option value="0.15">Game Type 3</option>
                                <option value="0.2">Game Type 4 </option>
                                <option value="0.25">Game Type 5</option>
                                <option value="0.3">Game Type 6 </option>
                                <option value="0.35">Game Type 7</option>
                                <option value="0.4">Game Type 8 </option>
                                <option value="0.45">Game Type 9</option>
                                <option value="0.5">Game Type 10 </option>
                            </select>


                            <label for="card_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Card Price</label>
                            <input type="text" id="card_price" required name="card_price"  class="bg-gray-50 border border-gray-300
                 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                 dark:border-gray-600 dark:placeholder-gray-400
                dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="card price"/>

                            <div class="mb-3 form-group">
                                <button class="btn btn-lg btn-warning " type="submit"> Start New Game</button>
                            </div>
                        </form>


                        <hr>

                        <div class="row">
                            @foreach(\App\Models\Card::agentCards() as $card)

                                <div class="col-md-2">
                                    @livewire('card-toggller', ['card_id' => $card->id], key($card->id))

                                </div>
                            @endforeach
                        </div>


                    </div>
                @else
                    <div class="col-md-12 col-sm-12 col-lg-10 m-3 p-3">
                        <a href="/card" class="btn btn-lg btn-danger btn-outline-dark" >Manage Cards </a>
                    </div>
                @endif
            </div>
        </div>
    @else
        <div>
            Non Active user
        </div>
    @endif
</div>
