<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Game;
use Illuminate\Database\Eloquent\Model;
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





    public function togglecard(Request $request){

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
       return  view('card.create');
    }

    public function generateCards(Request $request){
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
$numbers=[
  [
      (int) $request->input('cell00'),
      (int) $request->input('cell01'),
      (int) $request->input('cell02'),
      (int)$request->input('cell03'),
      (int)$request->input('cell04'),
  ],
    [
        (int)$request->input('cell10'),
        (int) $request->input('cell11'),
        (int) $request->input('cell12'),
        (int) $request->input('cell13'),
        (int) $request->input('cell14'),
  ],    [
        (int) $request->input('cell20'),
        (int)  $request->input('cell21'),
  'FREE',
        (int) $request->input('cell23'),
        (int) $request->input('cell24'),
  ],   [
        (int) $request->input('cell30'),
        (int) $request->input('cell31'),
        (int) $request->input('cell32'),
        (int) $request->input('cell33'),
        (int)$request->input('cell34'),
  ], [
        (int)$request->input('cell40'),
        (int)$request->input('cell41'),
        (int)$request->input('cell42'),
        (int) $request->input('cell43'),
        (int) $request->input('cell44'),
  ],
];


$card=new Card();
$card->card_name=$request->input('card_name');
$card->user_id=Auth::user()->id;
$card->numbers=json_encode($numbers);
$card->save();
return redirect()->back()->with('succuss','Card Saved Succuss');
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
        if($card->user_id==Auth::user()->id){
            $cards=Card::agentCards();

            return view('card.edit')->with(['card'=>$card,'cards'=>$cards]);
        }else{
            return  redirect()->back()->with('error','Cannot Edit Other Agents Card');
        }
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

        $numbers=[
            [
                (int) $request->input('cell00'),
                (int) $request->input('cell01'),
                (int)   $request->input('cell02'),
                (int)   $request->input('cell03'),
                (int)   $request->input('cell04'),
            ],
            [
                (int)   $request->input('cell10'),
                (int)   $request->input('cell11'),
                (int)   $request->input('cell12'),
                (int)  $request->input('cell13'),
                (int)   $request->input('cell14'),
            ],    [
                (int)  $request->input('cell20'),
                (int)   $request->input('cell21'),
                'FREE',
                (int)   $request->input('cell23'),
                (int)  $request->input('cell24'),
            ],   [
                (int) $request->input('cell30'),
                (int)  $request->input('cell31'),
                (int)   $request->input('cell32'),
                (int)   $request->input('cell33'),
                (int)   $request->input('cell34'),
            ], [
                (int)  $request->input('cell40'),
                (int)  $request->input('cell41'),
                (int)   $request->input('cell42'),
                (int)   $request->input('cell43'),
                (int)   $request->input('cell44'),
            ],
        ];



        $card->card_name=$request->input('card_name');
        $card->user_id=Auth::user()->id;
        $card->numbers=json_encode($numbers);
        $card->save();
        return redirect()->back()->with('succuss','Card Updated Succuss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
      $card->delete();
      return  redirect()->back()->with('success','Card Removed');
    }
}
