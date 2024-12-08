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

            @if(\App\Models\Game::getGameState()!="started")
                <div class="mb-3 form-group">
                    <input type="button" name="btn" value="Generate Cards" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn  btn-danger" />
                </div>
           @endif


    </div>

    <div class="row" id="cards">
        @foreach($cards as $card)

            <div class="col-md-4">


        <div class="max-w-sm pb-3 mb-4   border border-gray-200 rounded-lg  ">
             <h3 class="text-2xl   font-semibold"> Card Name : {{$card->card_name}}</h3>
            <form action="toggelcard" method="post" class="inline-form">
                @csrf
                <input type="hidden" name="card_id" value="{{$card->id}}">
                @if($card->is_active==0)
                    <button class="btn btn-sm btn-primary"> Add to Game</button>
                @else
                    <button class="btn btn-sm btn-danger"> Remove</button>
                @endif
                <a href="/card/{{$card->id}}/edit" class="btn btn-sm btn-info btn-outline-dark">Edit</a>
                <a href="#" class="btn btn-sm btn-info btn-outline-dark">Delete</a>

            </form>

            <table class="table table-bordered w-full text-center text-xl">
<tr class="text-2xl text-gray-400 bg-indigo-600">
    <td>B</td>
    <td>I</td>
    <td>N</td>
    <td>G</td>
    <td>O</td>
</tr>

         @for($i=0;$i<5;$i++)
              <tr class="w-4 h-4 border border-2 border-gray-700">
             @for($j=0;$j<5;$j++)
                 <td>
                 {{json_decode($card->numbers)[$j][$i]}}
                 </td>
             @endfor
             </tr>
            @endfor
         </table>
        </div>
    </div>
        @endforeach
</div>

</div>


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
        </div>
    </div>
    <script>
        $('#submitBtn').click(function() {
            /* when the button in the form, display the entered values in the modal */
            $('#lname').text($('#lastname').val());
            $('#fname').text($('#firstname').val());
        });

        $('#submit').click(function(){
            /* when the submit button in the modal is clicked, submit the form */
            alert('submitting');
            $('#formfield').submit();
        });
    </script>
</x-app-layout>
