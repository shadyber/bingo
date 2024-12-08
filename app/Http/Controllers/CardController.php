<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Pest\Laravel\json;

class CardController extends Controller
{


 public static function generateCard()
 {
     $columns = [
         range(1, 15),
         range(16, 30),
         range(31, 45),
         range(46, 60),
         range(61, 75)
     ];
     $card = [];
     foreach ($columns as $column)
     {
         shuffle($column);
         $card[] = array_slice($column, 0, 5);
     }
     $card[2][2]='FREE';
     // Set the center space as "FREE" $card[2][2] = 'FREE';

     return $card;
 }



public function saveGame(){
    $selected_cards  =json_encode(session()->get('selected_cards',[]));
    $random_numbers=json_encode(session()->get('random_numbers',[]));


if($selected_cards!="[]"){
    $game=Game::create([
        'user_id'=>Auth::user()->id,
        'selected_cards'=>$selected_cards,
        'random_numbers'=>$random_numbers,
    ]);

}




}
 // payment process form
    public function payCommision(){
     // count selected card

        // save transaction

        // calculate transaction
    }


    public function regeneraterandomarray(){

        $random_number_array = range(1, 75);
        shuffle($random_number_array );
        $random_number_array = array_slice($random_number_array ,0,75);

     return $random_number_array;


    }


    public function togglecard(Request $request){

     // confirm game state before addisng a card to list
        if(Game::getGameState()=="started")
        {
          $request->session()->flash("error","Game in progress ! you could not toggle Cards at this time.");

        }else{
            $card=Card::find($request->input('card_id'));
            $card->is_active=!$card->is_active;
            $card->save();

            $selected_cards=Card::activeCardsByAgent();
            // is card allowed on game in progress
            session()->put('selected_cards',$selected_cards);
        }

    return redirect()->back();
 }

 public function startnewgame(Request $request){

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

    session()->put('random_numbers',$random_numbers);

    $this->saveGame();
    $this->payCommision();



   return redirect()->route('dashboard');
 }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards=Card::where('user_id',Auth::user()->id)->get();
  return  view('card.index')->with('cards',$cards);
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

        if(Game::getGameState()=="started"){
            $request->session()->flash("error","Game is in progress ! you cannot generate new card at this time.");
            return redirect()->back();
        }
        $user_id=Auth::user()->id;

       Card::where('user_id',$user_id)->delete();
        $qnt = $request->input('cardsqnt');


        for ($i=0;$i<$qnt;$i++){
$cardjson=json_encode(self::generateCard());
$card =new Card();

  $card->user_id=Auth::user()->id;
  $card->card_name="".$i;
  $card->numbers=$cardjson;
  $card->is_active=false;
  $card->save();

        }
        session()->remove('selected_cards');
        session()->remove('random_numbers');
        return view('card.index')->with('cards',Card::where('user_id',Auth::user()->id)->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        //
    }
}
