
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cards') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="row">
            <div class="col-md-4">
                <input type="button" name="btn" value="Generate Cards" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn  btn-danger" />
            </div>
        </div>
<div class="row p-2">
    @foreach($cards as $card)
      <div class="col-md-3 m-2 p-2">
          <div class="card ">
              <div class="card-header flex-row">Card {{$card->card_name}}

                  <a href="#" class="btn btn-sm btn-info btn-outline-dark"> <i class="fa fa-pencil"></i>Edit</a>

              </div>
              <div class="card-body items-center">


              <table class="text-center w-full">
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
                            <td   @if($i==2 && $j==2) class="text-xs text-red-500" @endif> {{json_decode($card->numbers)[$j][$i]}} </td>
                          @endfor
                      </tr>
                  @endfor
              </table>
              </div>

          </div>
          <div class="card-footer">
              <form action="#" class="form-inline">
                  <a href="#" class="btn btn-sm btn-danger btn-outline-dark">Delete</a>
              </form>
          </div>
      </div>
    @endforeach
</div>




        <div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                @if(\App\Models\Game::getGameState()!="started")
                    <form class="max-w-sm mx-auto" action="card" method="post" >
                        <div class="modal-content">
                            <div class="modal-header">
                                Confirm Submit
                            </div>
                            <div class="modal-body">

                                @csrf
                                <div class="mb-3 form-group">
                                    <label for="cardsqnt" class="block mb-2 text-sm ">Number of Cards to Generate</label>
                                    <input type="number" id="cardsqnt" name="cardsqnt" value="10" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>





                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-success"> Genrate </button>
                            </div>

                        </div>
                    </form>
                @endif
            </div>
        </div>



    </div>
</x-app-layout>
