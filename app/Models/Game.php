<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Game extends Model
{
    use HasFactory;
    protected $fillable=['user_id','selected_cards','random_numbers','game_state'];

    public static  function getGameState(){
        $game=Game::where('user_id',Auth::user()->id)->get()->last();

        if($game!=null){
            // game exist
           return $game->game_state;
        }else{
            return "new";
        }
    }


    public static function  lastActiveGame(){
        $game=Game::where('user_id',Auth::user()->id)->where("game_state","started")->get()->last();

        if($game!=null){
            // game exist
            return $game;
        }
    }
}
