<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return  view('agent.index')->with('agents',Agent::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agent.create');
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function newregister (Request $request)
    {


        $validated = $request->validate([
            'email' => 'required',
            'name' => 'required',
        ]);

try{

      $lastuser=User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'user_type'=>'agent',
            'referral_user_id'=>auth()->user()->id,
            'password' => Hash::make($request->input('password')) // password
        ]);

     $agent= Agent::create([
            'name' => $request->input('agent_name'),
            'tel' => $request->input('tel'),
            'city' =>$request->input('city'),
            'user_id' => $lastuser->id,
            'location'=>$request->input('location'),
            'is_active'=>false
        ]);
}catch (\Exception $ex){
    return redirect()->back()->with(['error',$ex->getMessage()]);
}
        if($agent!=null){

            return redirect()->back()->with(['success','Agent Registerd']);
        }else{
            return redirect()->back()->with(['error','Agent Not Registerd']);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
    {
        if(Auth::user()->id==$agent->user_id ||Auth::user()->id=='0'){
            $games=$agent->user->games;
            return view('agent.show')->with(['agent'=>$agent,'games'=>$games]);
        }else{
            return  'not allowed';
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Agent $agent)
    {
    return view('agent.edit')->with('agent',$agent);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        //
    }
}
