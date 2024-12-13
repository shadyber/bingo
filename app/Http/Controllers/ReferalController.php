<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferalController extends Controller
{
    //

 public function index()
 {
     $agent_users=User::agent_users();


     return view('referal.index')->with('agent_users',$agent_users);
 }    public function create(){
        return view('referal.create');
    }
}
