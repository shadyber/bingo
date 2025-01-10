<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{


    public function saveGame($game_type,$card_price){
        $selected_cards  =json_encode(session()->get('selected_cards',[]));
        $random_numbers=json_encode(session()->get('random_numbers',[]));


        if($selected_cards!="[]"){
            $game=Game::create([
                'agent_commission'=>$game_type,
                'card_price'=>$card_price,
                'user_id'=>Auth::user()->id,
                'selected_cards'=>$selected_cards,
                'cards_qnt'=>count(json_decode($selected_cards)),
                'random_numbers'=>$random_numbers,
            ]);

        }

    }

    public function startnewgame(Request $request){

        $game_t=$request->input('game_type');
        $card_p=$request->input('card_price');

        if(Game::getGameState()=="started"){
            $request->session()->flash('message',"Game is In Progress...");
            return redirect()->back();
        }


        $selected_cards=Card::activeCardsByAgent();

        if(count($selected_cards)==0){
            $request->session()->flash('error','No cards are selected to start a game.');
            return  redirect()->back();
        }

        session()->put('selected_cards',$selected_cards);

        $random_numbers=$this->regeneraterandomarray();

        array_unshift($random_numbers,'FREE');
        session()->put('random_numbers',$random_numbers);

        $this->saveGame($game_t,$card_p);
        //$this->payCommision();



        return redirect()->route('dashboard');
    }

    public function regeneraterandomarray(){

        $random_number_array = range(1, 75);
        shuffle($random_number_array );
        $random_number_array = array_slice($random_number_array ,0,75);

        return $random_number_array;


    }

   public function resetGame(){
        $random_numbers=$this->regeneraterandomarray();
    $game=Game::lastActiveGame();
    $random_numbers=$this->regeneraterandomarray();

    array_unshift($random_numbers,'FREE');
    session()->remove('random_numbers');
    session()->put('random_numbers',$random_numbers);

    $game_t=$game->agent_commission;
    $card_p=$game->card_price;
    $this->saveGame($game_t,$card_p);
    return redirect('dashboard');

}
    public function endGame(){
        $game=Game::lastActiveGame();
        if($game){
            $game->game_state="finished";
        }
        $game->save();
        session()->remove("selected_cards");
        session()->remove("random_numbers");

        foreach(Card::activeCardsByAgent() as $card){
            $card->is_active=false;
            $card->save();
        }

        return redirect()->route("starter")->with(["message","Game Ended"]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
