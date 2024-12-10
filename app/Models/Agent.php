<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $fillable=['name','tel','city','location','is_active','user_id'];

    public static function  totalTransaction($agentid){
$user_id=Agent::find($agentid)->user_id;
        $games=Game::where('user_id',$user_id)->get();
        $totalmake=0;
        foreach ($games as $game){
$totalmake+=($game->card_price*$game->cards_qnt);

        }
        return $totalmake;
}
public static function totalCommision($agentid){
    $user_id=Agent::find($agentid)->user_id;
    $games=Game::where('user_id',$user_id)->get();

    $totalcommision=0;
    foreach ($games as $game){

        $totalcommision+=($game->card_price*$game->cards_qnt)*$game->agent_commission;
    }
    return $totalcommision;
}

    public function user(){
        return $this->belongsTo(User::class);
    }

}
