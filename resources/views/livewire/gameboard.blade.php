<div>

 <div class="row">
      <div class="col-md-12 ">
            <div class="sm:w-full p-1 m-1">

                    <table class="table  w-full   text-center mb-2 text-2xl center">

                        <tbody>




                        @for($i=0,$k=1;$i<5;$i++)


                            <tr class="h-3">
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



             </div>
      </div>

 </div>
        <div class="row">

                <div class="col-md-4 m-1 p-1 bg-red-100">

                <div class="row flex">
                  <div class="col-md-6">
                      <p class="pl-3 rounded-full bg-gray-200 text-center items-center font-semibold">
                          <i class="display-6">
                              @switch($call=$random_number_array[$call_index])
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

                          </i><i class="display-3">{{$random_number_array[$call_index]}}</i></p>
                  </div>
                    <div class="col-md-6 flex">



                        @foreach(array_reverse($call_history) as $k=>$call)
                            @if($k<5)
                                <div class="col-md-2 bg-gray-100  card p-1 m-1" >


                                            @switch($call)
                                                @case($call<16)
                                                B
                                                @break

                                                @case($call<31)
                                                I
                                                @break

                                                @case($call<46)
                                                N
                                                @break

                                                @case($call<61)
                                                G
                                                @break
                                                @case($call<76)
                                                O
                                                @break
                                            @endswitch



                                        <p class="text-2xl font-semibold"> {{$call}}</p>



                                </div>
                            @endif
                        @endforeach
                </div>

                </div>
                        <div class="col-md-6 ">


                            <div class="bg-gray-200">
                                @if(count($selected_cards)>0)
                                    @foreach($selected_cards as $selectedcard)
                                        <span class="inline bg-success p-1 m-1 rounded-full"> {{$selectedcard->card_name}}</span>
                                    @endforeach
                                @else
                                    <p class="text-red-500 text-2xl"> Must Select a Cards to Start Game </p>
                                    {{ session()->flash('message', 'You have to select card to start a game.')}}
                                    {{$this->redirect('/card')}}
                                @endif

                            </div>
                 </div>



                </div>
            <div class="col-md-3">


                <div class="row">
                    <div class="col-md-12">  <span class="border border-2 border-gray-300">Game ID:  {{$game? $game->id : ''}} </span>
                        <span class="card-text">Total Call :
                              {{$call_index+1}}</span>
                    </div>
                    <div class="col-md-12">
                        <a href="#" class="btn btn-info btn-sm" id="beginButton" wire:click="beginGame" >Begin Game</a>
                        <a href="#" class="btn btn-success btn-sm" id="startButton" >Call Auto</a>
                        <a href="#" class="btn btn-warning btn-sm" id="stopButton">Pause Game</a>
                        <a href="#" class="btn btn-info btn-sm" id="nextButton"  wire:click="nextCall">Call Next</a>
                    </div>
                    <div class="col-md-12">
                        <select name="selected_cards" id="selected_cards" class="form-control" wire:model="selected_card_id">
                            <option value="">Select Card to Check</option>
                            @foreach($selected_cards as $selectedcard)
                                <option value="{{$selectedcard->id}}"> {{$selectedcard->card_name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-12">
                        @if($isBingo)
                            <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                            <div class="sm:flex sm:items-start">
                                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                                     Congratulation Card Number X
                                                    </h3>
                                                    <div class="mt-2">
                                                        <p class="text-sm text-gray-500">
                                                            {{$selectedcard->numbers}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                            <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" wire:click="closeModal">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        @else

                            other modal
                               @endif

                            <a href="#" class="btn block btn-danger"  wire:click="checkBingo({{$selectedcard->numbers}})" > Check Pattern</a>

                    </div>

                 </div>
               </div>

                <div class="col-md-3">
                    <p class="display-6 text-right">Winner Prize</p>
                   <div class="font-semibold display-4 text-rainbow-animation"> $ETB2000</div>

                </div>




        </div>

<audio id="myAudio"></audio>
    <style>
        .text-rainbow-animation {
            font-family:arial black;
            font-size:60px;
            background-image:
                linear-gradient(to right, red,orange,yellow,green,blue,indigo,violet, red);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: rainbow-animation 35s linear infinite;
        }

        @keyframes rainbow-animation {
            to {
                background-position: 4500vh;
            }
        }
    </style>

<script>


    document.addEventListener('livewire:load', function () {


    window.addEventListener('playAudio', event => {
        const audio = document.getElementById('myAudio');
        audio.src = event.detail.url;
        audio.play();
    });


        document.getElementById('startButton').addEventListener('click', startInterval);
        document.getElementById('stopButton').addEventListener('click', stopInterval);
        let interval = null;

        function startInterval() {

            stopInterval();

            interval = setInterval(function () {
                Livewire.emit('runAuto'); }, 3000);

        }

        function stopInterval() {
            clearInterval(interval);

        }



        // Start the interval when the page loads //

        // Example buttons to start and stop the timer

    });
</script>

</div>

