<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Card extends Model
{
    use HasFactory;
    protected $fillable=['user_id','card_name','numbers','is_active'];

    public static function  activeCardsByAgent(){
     return  Card::where('is_active',true)->where('user_id',Auth::user()->id)->get();
}

}
