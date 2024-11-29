<div>
    <div class="row">


        <div class="col-md-9 ">
            <div class="rightside">

                <table class="table  w-full  p-4 ml-3 text-center mb-4 text-2xl center">

                    <tbody>




                    @for($i=0,$k=1;$i<5;$i++)


                        <tr class="h-4 ">
                            <th class="bg-gray-50 rounded-full border border-gray-100  text-green-400 font-semibold">
                                @switch($i)
                                    @case(0)
                                    B
                                    @break

                                    @case(1)
                                    I
                                    @break

                                    @case(2)
                                    N
                                    @break

                                    @case(3)
                                    G
                                    @break
                                    @case(4)
                                    O
                                    @break
                                @endswitch
                            </th>


                            @for($j=0;$j<15;$j++)
                                <td class="border border-gray-100 border-3   "> <div class="card card-body

                                        @if($k==$random_number_array[$call_index])
                                        bg-red-600 text-green-400 rounded-full
                                        @else
                                            bg-green-100 text-gray-900
                                        @endif">

                                        {{$k++}}
                                    </div>
                                </td>
                            @endfor
                        </tr>
                    @endfor
                    </tbody>
                </table>

                <hr>
                <h3 class="text-gray-300 text-xl">Call History</h3>

                <div class="row">@for($i=$call_index; $i>=0; $i--)
                        <div class="col-md-1 m-1 p-1">

                            <div class="card card-body font-semibold text-2xl bg-gray-200 rounded-full "> {{$random_number_array[$i]}}</div>

                        </div>
                    @endfor


                </div>

            </div>
        </div>

        <div class="col-md-3">
            <div class="leftside bg-gray-200">
                <div class="card" style="width: 28rem;">
                    <div class="card-body p-2 m-2 space-y-1">
                        <h5 class="card-title">Bingo Addis  Logo</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Last Call</h6>
                        <h1  class="text-2xl font-semibold rounded-full bg-gray-200 text-center">{{$random_number_array[$call_index]}}</h1>
                        <p class="card-text">Total Call</p>
                        <h1  class="text-2xl font-semibold rounded-full bg-gray-200 text-center">{{$call_index+1}}</h1>
                        <a href="#"  class="btn block btn-success">New Game</a>
                        <a href="#" class="card-link btn-outline-success btn block">Auto Play</a>
                        <a href="#" class="card-link btn-outline-success btn block"  wire:click="nextCall">Next Call</a>
                    </div>
                </div>



                <div class="card" style="width: 28rem;">
                    <div class="card-body p-2 m-2 space-y-1">


                        <table class="table table-dark text-center border border-gray-100 border-3 ">


                            <tr class="border border-3 border-gray-100">
                                <td>B</td>
                                <td>I</td>
                                <td>N</td>
                                <td>G</td>
                                <td>O</td>
                            </tr>


                            <tr>
                                <td class="border border-gray-100 rounded-full">X</td>
                                <td class="border border-gray-100 rounded-full">X</td>
                                <td class="border border-gray-100 rounded-full">X</td>
                                <td class="border border-gray-100 rounded-full">X</td>
                                <td class="border border-gray-100 rounded-full">X</td>
                            </tr>

                            <tr>
                                <td class="border border-gray-100 rounded-full">X</td>
                                <td class="border border-gray-100 rounded-full">X</td>
                                <td class="border border-gray-100 rounded-full">X</td>
                                <td class="border border-gray-100 rounded-full">X</td>
                                <td class="border border-gray-100 rounded-full">X</td>
                            </tr>

                            <tr>
                                <td class="border border-gray-100 rounded-full">X</td>
                                <td class="border border-gray-100 rounded-full">X</td>
                                <td class="border border-gray-100 rounded-full text-xl text-sm">free</td>
                                <td class="border border-gray-100 rounded-full">X</td>
                                <td class="border border-gray-100 rounded-full">X</td>
                            </tr>

                            <tr>
                                <td class="border border-gray-100 rounded-full">X</td>
                                <td class="border border-gray-100 rounded-full">X</td>
                                <td class="border border-gray-100 rounded-full">X</td>
                                <td class="border border-gray-100 rounded-full">X</td>
                                <td class="border border-gray-100 rounded-full">X</td>
                            </tr>

                            <tr>
                                <td class="border border-gray-100 rounded-full">X</td>
                                <td class="border border-gray-100 rounded-full">X</td>
                                <td class="border border-gray-100 rounded-full">X</td>
                                <td class="border border-gray-100 rounded-full">X</td>
                                <td class="border border-gray-100 rounded-full">X</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
