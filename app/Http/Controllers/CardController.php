<?php

namespace App\Http\Controllers;

use App\Models\Card;
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
     } // Set the center space as "FREE" $card[2][2] = 'FREE';
     return $card;
 }

 public function togglecard(Request $request){
    $card=Card::find($request->input('card_id'));
    $card->is_active=!$card->is_active;
    $card->save();
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
        $user_id=Auth::user()->id;
Card::where('user_id',$user_id)->delete();
        $qnt = $request->input('cardsqnt');


        for ($i=0;$i<$qnt;$i++){
$cardjson=json_encode(self::generateCard());
$card =new Card();

  $card->user_id=Auth::user()->id;
  $card->card_name=Auth::user()->id."/".$i;
  $card->numbers=$cardjson;
  $card->is_active=false;
  $card->save();

        }
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
