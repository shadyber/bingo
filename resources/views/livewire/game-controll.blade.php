<div>
    <hr>
    Select Game Type
    <hr>
    set card price

    <hr>
    Select a cards from the list
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
