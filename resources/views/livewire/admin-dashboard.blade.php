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
                   <td>Numbers of Games</td>
                   <td>Transaction Made</td>
                   <td>Commision Made</td>
                   <td>Registerd At</td>

                   <td>Is Active </td>
                   </tr>

                   @foreach($agents as $agent)

                                <tr>
                                    <td> {{$agent->name}}</td>
                                    <td> {{count($agent->user->game)}}</td>
                                    <td>

                                        {{\App\Models\Agent::totalTransaction($agent->id)}}

                                    </td>
                                    <td>
                                        {{\App\Models\Agent::totalCommision($agent->id)}}

                                    </td>
                                    <td>{{$agent->created_at->diffForHumans()}}</td>

                                    <td>
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="checkbox" value="" class="sr-only peer" {{$agent->is_active? "checked" : " "}} >
                                            <div class="relative w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Active Status</span>
                                        </label>
                                    </td>
                                </tr>

                   @endforeach
               </table>
             </div>

        </div>

    </div>

</div>
