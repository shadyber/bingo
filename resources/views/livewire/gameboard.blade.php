<div>
    <div class="row">

           <div class="col-md-9 ">
            <div class="rightside p-2 m-3">

                <table class="table  w-full   text-center mb-4 text-2xl center">

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
                                <td class="border border-gray-100 border-3   ">
                                 <div class="card card-body


                                      @if((array_search($k,$call_history,true)!=null)||$k==$random_number_array[0])
                                     bg-red-600 text-green-400 rounded-full
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

                <div class="row">
                    @foreach(array_reverse($call_history) as $call)
                        <div class="col-sm-1 m-1 p-1 border-2 border border-gray-300 rounded-full ">

                            <div class="card card-body font-semibold bg-gray-200 rounded-full text-center">
                                <small class="text-xs">

                                @switch($call)
                                    @case($call<15)
                                    B
                                    @break

                                    @case($call<30)
                                    I
                                    @break

                                    @case($call<45)
                                    N
                                    @break

                                    @case($call<60)
                                    G
                                    @break
                                    @case($call<76)
                                    O
                                    @break
                                @endswitch

                                </small>

                              <p class="text-2xl font-semibold"> {{$call}}</p>

                            </div>

                        </div>
                    @endforeach


                </div>

            </div>
        </div>

           <div class="col-md-3">
            <div class="leftside bg-gray-200">
                <div class="card" style="width: 28rem;">
                    <div class="card-body p-2 m-2 space-y-1">
                        <h5 class="card-title">Game ID:  {{$game? $game->id : ''}} </h5>
                        <h6 class="card-subtitle mb-2 text-muted">Last Call</h6>
                        <h1  class="text-2xl font-semibold rounded-full bg-gray-200 text-center">{{$random_number_array[$call_index]}}</h1>
                        <p class="card-text">Total Call</p>
                        <h1  class="text-2xl font-semibold rounded-full bg-gray-200 text-center">{{$call_index+1}}</h1>


                        <div class="input-group">
                            <label for="selected_cards">Selected Cards</label>
                            <div class="card-body" >
                                @if(count($selected_cards)>0)
                                @foreach($selected_cards as $selectedcard)
                                    <span class="inline bg-success p-1 m-1 rounded-full"> {{$selectedcard->card_name}}</span>
                                    @endforeach
                                @else
                                <p class="text-red-500 text-2xl"> Must Select a Cards to Start Game</p>
                                {{    session()->flash('message', 'You have to select card to start a game.')}}
                                    {{$this->redirect('/card')}}
                                    @endif

                            </div>
                        </div>
                        <a href="#" class="card-link btn-primary btn block" id="startButton">Auto Play</a>
                        <a href="#" class="card-link btn-primary btn block" id="stopButton">Manual Call</a>
                        <a href="#" class="card-link btn-secondary btn block"  wire:click="nextCall">Next Call</a>

                        <div class="input-group">
                            <label for="selected_cards">Selected Cards</label>
                            <select name="selected_cards" id="selected_cards" class="form-control" wire:model="selected_card_id">
                                <option value="">Select Card to Check</option>
                                @foreach($selected_cards as $selectedcard)
                                    <option value="{{$selectedcard->id}}"> {{$selectedcard->card_name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <a href="#" class="btn block btn-danger btn-lg" wire:click="showModal()" >Check Card: {{$selected_card_id}}</a>

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


        <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bingo Card to Check</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

     @if($card_to_check!=null)



                                <div class="max-w-sm pb-3 mb-4   border border-gray-200 rounded-lg  ">



                                    <table class="table border border-2 border-gray-300 text-2xl p-4 ml-3 text-center mb-4  center">

                                        <tbody>


                                        @foreach(json_decode($card_to_check[0]->numbers) as $key=>$numbers)
                                            <tr class="border border-2 border-gray-300 text-2xl p-4 ml-3 text-center mb-4">
                                                <th class="border border-2 border-gray-300 rounded-full ">
                                                    @switch($key)
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
                                                @foreach($numbers as $keyy=>$number)
                                                    <td class="text-2xl p-2 mx-auto text-center @if((array_search($number,$call_history,true)!=null)) text-red-500 text-2xl font-semibold border-danger border-2 @endif  "> @if($key==2 && $keyy==2) <span class="text-xs font-medium text-red-500 text-2xl font-semibold border-danger border-2"> FREE</span>  @else {{$number}} @endif</td>
                                                @endforeach

                                            </tr>
                                        @endforeach


                                        </tbody>
                                    </table>

                                </div>
                        @endif
                    </div>




                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Winner</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>

                    </div>
                </div>
            </div>
        </div>



    </div>
    <script>
        document.addEventListener('livewire:load', function () {
            window.addEventListener('show-modal', event => {
                $('#exampleModal').modal('show');
            });

            window.addEventListener('hide-modal', event => {
                $('#exampleModal').modal('hide');
            });
        });
    </script>

    <script>

        document.addEventListener('livewire:load', function () {
            let interval = null;
            function startInterval() {
                interval = setInterval(function () {
                    Livewire.emit('runAuto'); }, 5000);
            }

            function stopInterval() {
                clearInterval(interval);
            }
            startInterval();
            stopInterval();
            // Start the interval when the page loads //
        // Example buttons to start and stop the timer
        document.getElementById('startButton').addEventListener('click', startInterval);
        document.getElementById('stopButton').addEventListener('click', stopInterval); });
</script>
</div>

