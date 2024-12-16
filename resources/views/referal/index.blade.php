<x-app-layout>
    <div class="pt-4 bg-gray-100 dark:bg-gray-900">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                @include('layouts.flash-message')
            </div>




                    <div class="col-md-3"><a href="/referral/create" class="btn btn-info btn-sm">New Agent</a></div>


                    <table class="table-bordered table-striped w-full">
                        <tr class="bg-indigo-600 text-2xl">
                            <td>User Name</td>
                            <td>Games Qnt</td>
                            <td>All Trnx</td>
                            <td>Income</td>
                            <td>Registerd </td>
                            <td>Status </td>


                        </tr>

                        @foreach($agent_users as $user)
@php
$agent=$user->agent;
@endphp
                            <tr>
                                <td><a href="/agent/{{$agent->id}}"> {{$agent->name}}  <i class="text-xs"> {{$agent->email}}</i> </a></td>
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
</x-app-layout>
