<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Cards') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden sm:rounded-lg mb-4 pb-3">


<div class="container text-gray-600">
    <div class="row">
      <div class="col-md-6">
          <form class="max-w-sm mx-auto" action="card" method="post" enctype="multipart/form-data">
              @csrf
              <div class="mb-3 form-group">
                  <label for="cardsqnt" class="block mb-2 text-sm ">Number of Cards to Generate</label>
                  <input type="number" id="cardsqnt" name="cardsqnt" value="10" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              </div>

              <div class="mb-3 form-group">
                <button class="btn btn-lg btn-warning "> Generate new Cards</button>
              </div>
          </form>
      </div>
        <div class="col-md-6">
            <a href="#" class="btn btn-lg btn-primary"> <i class="fa fa-print"></i>Print All Cards</a>
            <a href="#" class="btn btn-lg btn-danger"> <i class="fa fa-trash"></i>Delete All Cards</a>


        </div>
    </div>

<div class="row">
        @foreach($cards as $card)

            <div class="col-md-4">


        <div class="max-w-sm pb-3 mb-4   border border-gray-200 rounded-lg  ">
  <h3 class="text-2xl   font-semibold"> Card Name : {{$card->card_name}}</h3>
            <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                <span class="w-2 h-2 me-1 rounded-full"></span>
                Available
            </span>

        <table class="table table-dark w-3/4 text-2xl p-4 ml-3 text-center mb-4  center">

            <tbody>


            @foreach(json_decode($card->numbers) as $key=>$numbers)
            <tr class="border-2 border-gray-200 text-2xl p-4 ml-3 text-center mb-4">
           <th class="bg-indigo-50 rounded-full ">
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
                @foreach($numbers as $number)
             <td class="border-2 border-gray-700 text-2xl p-2 mx-auto text-center font-semibold">{{$number}}</td>
                @endforeach

            </tr>
            @endforeach


            </tbody>
        </table>

        </div>
</div>
        @endforeach
</div>

</div>

            </div>
        </div>
    </div>
</x-app-layout>
