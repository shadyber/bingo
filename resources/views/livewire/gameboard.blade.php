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



                            <a href="#" class="btn block btn-danger"  wire:click="checkBingo({{$selectedcard->numbers}})" > Check Pattern</a>

                    </div>

                 </div>
               </div>

                <div class="col-md-3">
                    <p class="display-6 text-right">Winner Prize</p>
                   <div class="font-semibold display-4 text-rainbow-animation"> $ETB2000</div>

                </div>





        </div>


<div class="container items-center">


    <!-- Bottom Right Modal -->
    <div id="bottom-right-modal" data-modal-placement="bottom-right" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 @if(!$isOpen) hidden @endif w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                      Patter Check
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg
                     text-sm w-8 h-8 ms-auto inline-flex justify-center items-center
                     dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="bottom-right-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14" wire:click="closeModal">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only" onclick="closeModal()">Continue Game</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">

                    @if($isBingo)
                Winner
                    @else
Not Winner
                    @endif


                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="bottom-right-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"  onclick="closeModal()">Continue Game</button>
                    <button data-modal-hide="bottom-right-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Discard This Card</button>
                </div>
            </div>
        </div>
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

