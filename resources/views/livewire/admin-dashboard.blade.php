<div>
    <div class="row">
        <div class="col-md-12 p-4 m-4">

            <div class="row">
                <div class="col-md-3"><a href="/agent/create" class="btn btn-info btn-sm">New Agent</a></div>
            </div>
             <div class="row">
               <table class="table-bordered table-striped">
                   <tr class="bg-indigo-600 text-2xl">
                   <td>User Name</td>

                   <td>Games Qnt</td>
                   <td>All Trnx</td>
                   <td>Income</td>
                   <td>Registerd </td>
                   <td>Status </td>


                   </tr>

                   @foreach($agents as $agent)

                                <tr>
                                    <td><a href="/agent/{{$agent->id}}"> {{$agent->name}} <br><small>  {{$agent->user->email}}</small>   </a></td>

                                    <td> {{count($agent->user->games)}}</td>
                                    <td>

                                        {{\App\Models\Agent::totalTransaction($agent->id)}}

                                    </td>
                                    <td>
                                        {{\App\Models\Agent::totalCommision($agent->id)}}

                                    </td>
                                    <td>{{$agent->created_at->diffForHumans()}}</td>

                                    <td>
                                       @livewire('toggele-user',['agent'=>$agent])
                                    </td>
                                </tr>

                   @endforeach
               </table>
             </div>

        </div>

    </div>

</div>
