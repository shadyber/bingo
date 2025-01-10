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
                      <p class="pl-3 rounded-full bg-gray-200 text-center font-semibold">
                          <i class="display-6  text-rainbow-animation">
                              @switch($call=$random_number_array[$call_index])
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

                                  {{$random_number_array[$call_index]}}</i></p>
                  </div>
                    <div class="col-md-6 flex">



                        @foreach(array_reverse($call_history) as $k=>$call)
                            @if($k<5)
                                <div class="col-md-2 bg-gray-100  card p-1 m-1 font-semibold" >


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
                                    @foreach($selected_cards as $selected_card)
                                        <a href="#" class="border-2 border-gray-700" wire:click="changeSelectedCard({{$selected_card->id}})"> Card:  {{$selected_card->card_name}}</a>
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
                    @if($call_index<2)

                            <button wire:click="getReady" class="btn btn-sm btn-warning bg-lg">Get Ready  </button>


                        @endif
                    <div class="col-md-12">

                        <button wire:click="togglePause" class="btn btn-sm btn-info m-2 p-2"> {{ $paused ? 'Run Auto' : 'Pause Auto' }} </button>

                        <a href="#" class="btn btn-info btn-sm p-2 m-2" id="nextButton"  wire:click="nextCall">Call Next</a>
                    </div>
                    <div class="col-md-12">

                        <div class="p-2 m-2">
                            <select name="selct_card_to_chek" id="selectcardtochec" wire:model="card_to_check_id" onchange="hideResultShowCalc()">
                                <option value="">Select Card to Check</option>
                                @foreach($selected_cards as $selected_card)
                                    <option value="{{$selected_card->id}}"> {{$selected_card->card_name}}</option>
                                @endforeach
                            </select>


                        </div>
                       @if($card_to_check_id!=null)

                        <a href="#" id="checkResultButton"  wire:click="checkBingo({{\App\Models\Card::find($card_to_check_id)->numbers}})"  class="btn btn-sm btn-info btn-outline-dark">Check Now</a>
                        <a href="#" id="showResultButon" data-toggle="modal"   data-target="#bingoCheckModal"  class="btn btn-sm btn-info btn-outline-dark" wire:click="stopTimer()">Show Result </a>

                        @endif


                    </div>

                    <div class="p-3 m-3">

                        <input type="text" id="card_name"    wire:model="search" >
                        <button class="btn btn-sm btn-primary" wire:click="searchCard">Check</button>
                    </div>
                 </div>
               </div>

                <div class="col-md-3">
                    <p class="display-6 text-right"><span class="text-xs">{{\App\Models\Game::lastActiveGame()->card_price}}ETB </span> <sup class="text-xs">X{{\App\Models\Game::lastActiveGame()->agent_commission}} </sup>  Winner Prize :</p>
                   <div class="font-semibold display-4 text-rainbow-animation"> $ETB {{\App\Models\Game::winPrize()}} </div>

                </div>





        </div>



    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="bingoCheckModal" tabindex="-1" role="dialog" aria-labelledby="bingoCheckModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Check Winner @if($card_to_check_id) {{\App\Models\Card::find($card_to_check_id)->card_name}} @endif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
<div class="container">
<div class="row p-2 m-2">
                    @if($card_to_check)
<div class="col-md-6 p-2 m-2">
    <a href="#" id="checkResultButton"  wire:click="checkBingo({{\App\Models\Card::find($card_to_check_id)->numbers}})"  class="btn btn-sm btn-info btn-outline-dark p-2 m-2">Check Now</a>

    <table>
                            <tr>
                                <td class="border-2 border-gray-700 text-2xl p-2 mx-auto text-center font-semibold bg-indigo-600">B</td>
                                <td class="border-2 border-gray-700 text-2xl p-2 mx-auto text-center font-semibold bg-indigo-600">I</td>
                                <td class="border-2 border-gray-700 text-2xl p-2 mx-auto text-center font-semibold bg-indigo-600">N</td>
                                <td class="border-2 border-gray-700 text-2xl p-2 mx-auto text-center font-semibold bg-indigo-600">G</td>
                                <td class="border-2 border-gray-700 text-2xl p-2 mx-auto text-center font-semibold bg-indigo-600">O</td>

                            </tr>
                            @for($i=0;$i<5;$i++)
                                <tr>
                                    @for($j=0;$j<5;$j++)
                                        <td class="border-2 border-gray-700 @if($i==2 && $j==2) text-sm @else text-2xl @endif p-2 mx-auto text-center font-semibold    @if((array_search($card_to_check[$j][$i],$call_history,true)!=null)||$card_to_check[$j][$i]==$random_number_array[0])
                                            bg-success text-green-red rounded-full
@endif"> {{$card_to_check[$j][$i]}}</td>
                                    @endfor
                                </tr>
                            @endfor
                        </table>
</div>
                    @else
                        <div class="col-md-12">
                        No Card Selected to Check
                        </div>
                    @endif
                    @if($isBingo)
                              <div class="col-md-6">
                            <div class="trophy">
                                <img src="https://i.ibb.co/kVZ3CN6/trophy.png" alt="trophy" width="64px">
                            </div>
                            <div class="text">
                                <h1>Award</h1>
                            </div>
                            <script>
                                confetti.start();
                            </script>
                                        <div class="col-md-6">
                    @else
                                                <div class="col-md-6">
                 <p class="display-6 align-bottom">Not Win </p>
                                                    <div class="col-md-6">
                    @endif




                </div>
                                                </div>
                                        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
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
   document.addEventListener('keydown', function(event) {
        if (event.code === 'Space') { Livewire.emit('togglePause');
        } });




    document.addEventListener('livewire:load', function () {

        let interval;
        function startTimer() {
            interval = setInterval(() => {
                Livewire.emit('nextCall');
                }, 4000);
            // 1 second interval
            }
   function stopTimer() {
            clearInterval(interval);
        }
        Livewire.on('callNext', () => {
          if(@this.$paused){

          }else{
startTimer();
          }
        });
       Livewire.emit('callNext'); // Initial call to start the process // To ensure the timer starts running immediately
     stopTimer();
        startTimer();

        window.addEventListener('playAudio', event => {
            try{


            const audio = document.getElementById('myAudio');
            audio.src = event.detail.url;
            audio.play();
             }catch(Exception){

            }
        });


    });



</script>



</div>

