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

            <script type="text/javascript">
                function PrintElem(elem) {
                    Popup($(elem).html());
                }

                function Popup(data) {
                    var myWindow = window.open('', 'my div', 'height=400,width=600');
                    myWindow.document.write('<html><head><title>my div</title>');
                    /*optional stylesheet*/ //myWindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
                    myWindow.document.write('  <link rel=\"stylesheet\" href=\"/assets/css/bootstrap.min.css\" >');
                    myWindow.document.write('</head><body >');
                    myWindow.document.write('<div class=\"row\">')
                    myWindow.document.write(data);
                    myWindow.document.write('</div>')
                    myWindow.document.write('</body></html>');
                    myWindow.document.close(); // necessary for IE >= 10

                    myWindow.onload=function(){ // necessary if the div contain images

                        myWindow.focus(); // necessary for IE >= 10
                        myWindow.print();
                        myWindow.close();
                    };
                }
            </script>

            <a href="javascript:PrintElem('#cards')" class="btn btn-lg btn-primary p-1 m-1"> <i class="fa fa-print"></i>Print All Cards</a>

           

        </div>
        <div class="col-md-6 ">

                <form class="max-w-sm mx-auto" action="card" method="post" >
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
    </div>
    <hr>
<div class="row" id="cards">
        @foreach($cards as $card)

            <div class="col-md-4">


        <div class="max-w-sm pb-3 mb-4   border border-gray-200 rounded-lg  ">
  <h3 class="text-2xl   font-semibold"> Card Name : {{$card->card_name}}</h3>
            <form action="toggelcard" method="post"

            >
                @csrf
                <input type="hidden" name="card_id" value="{{$card->id}}">
                @if($card->is_active==0)
                    <button class="btn btn-sm btn-primary"> Add</button>
                @else
                    <button class="btn btn-sm btn-danger"> Remove</button>
                @endif
            </form>


        <table class="table  w-3/4 text-2xl p-4 ml-3 text-center mb-4  center">

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
                @foreach($numbers as $keyy=>$number)
             <td class="border-2 border-gray-700 text-2xl p-2 mx-auto text-center font-semibold"> @if($key==2 && $keyy==2) <span class="text-xs font-medium rounded-full "> FREE</span>  @else {{$number}} @endif</td>
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
