<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agent Detail') }}
        </h2>
    </x-slot>

    <div class="pt-4 bg-gray-100 dark:bg-gray-900">
        <div class="min-h-screen ">

                <div class="container mx-auto py-8">
                    <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
                        <div class="col-span-4 sm:col-span-3">
                            <div class="bg-white shadow rounded-lg p-6">
                                <div class="flex flex-col items-center">
                                    <img src="{{$agent->photo}}" class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">

                                    </img>
                                    <h1 class="text-xl font-bold">{{$agent->name}}</h1>
                                    <p class="text-gray-700">{{$agent->city}}</p>
                                    <div class="mt-6 flex flex-wrap gap-4 justify-center">
                                        <a href="tel:{{$agent->tel}}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Call</a>
                                        <a href="#" class="bg-gray-300 hover:bg-gray-400  py-2 px-4 rounded">  @livewire('toggele-user',['agent'=>$agent])</a>
                                    </div>
                                </div>
                                <hr class="my-6 border-t border-gray-300">
                                <div class="flex flex-col">
                                    <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Games </span>

                                        <ul class="list-group">
                                            <li class="list-group-item d-flex
                        justify-content-between
                        align-items-center">
                                                Type 1
                                                <span class="badge bg-warning
                                rounded-pill">
                                4
                        </span>
                                            </li>
                                            <li class="list-group-item d-flex
                        justify-content-between
                        align-items-center">
                                                Type 3
                                                <span class="badge bg-primary
                            rounded-pill">
                            2
                        </span>
                                            </li>
                                            <li class="list-group-item d-flex
                        justify-content-between
                        align-items-center">
                                                Type 4
                                                <span class="badge bg-danger
                            rounded-pill">
                            1
                        </span>
                                            </li>
                                        </ul>

                                </div>
                            </div>
                        </div>
                        <div class="col-span-4 sm:col-span-9">
                            <div class="bg-white shadow rounded-lg p-6">
                                <h2 class="text-xl font-bold mb-4">Net Transaction <span> {{$totalTransaction}}</span></h2>
                                <h3 class="text-xl font-bold mb-4">Net Income <span>{{$totalCommision}}</span></h3>
                                <p class="text-gray-700">

                                <form action="#" class="form-horizontal inline" method="get">

                                    <input type="date" name="start_date" value="{{\Illuminate\Support\Carbon::today()}}" > to
                                    <input type="date" name="end_date" value="{{today()}}">
                                    <input type="submit" value="filter" class="btn btn-lg btn-primary">
                                </form>
                                </p>




                                <h2 class="text-xl font-bold mt-6 mb-4">Transactions</h2>


                                <div class="mb-6">
                                    <div class="flex justify-between flex-wrap gap-2 w-full">
                                        <table class="table-striped w-full border-gray-700 table-bordered">
                                            <tr class="bg-indigo-600">
                                                <td> Total </td>
                                                <td> Shop Gain</td>
                                                <td> Payout</td>
                                                <td> Time</td>
                                            </tr>

                                            @foreach($games as $game)
                                                <tr>
                                                <td> {{\App\Models\Game::gamePrize($game->id)}} ETB</td></td>
                                                <td>  {{\App\Models\Game::gamePrize($game->id)* $game->agent_commission}}  ETB</td>
                                                <td>Payed</td>
                                                <td>{{$game->created_at}}</td>
                                                </tr>
                                                @endforeach
                                        </table>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <script>

    </script>
</x-app-layout>
