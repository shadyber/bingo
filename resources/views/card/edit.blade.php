<x-app-layout>
    <header>
        {{__('Edit Cards')}}
    </header>
    <div class="pt-4 bg-gray-100 dark:bg-gray-900 row">
<div class="col-md-6">
    <div class="w-full sm:max-w-2xl   bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg prose dark:prose-invert">
        <form action="{{ route('card.update', $card->id) }}" method="POST">
            {{ method_field('PATCH') }}
            @csrf
            <div class="col-md-6 p-2 m-2">
                <label for="card_name">Card Name</label>
                <input type="text" name="card_name" value="{{$card->card_name}}" required>
            </div>

            <table class="w-full text-2xl text-center p-2 m-1">
                <tr class="bg-indigo-600 text-2xl">
                    <td>B</td>
                    <td>I</td>
                    <td>N</td>
                    <td>G</td>
                    <td>O</td>
                </tr>

                @for($i=0;$i<5;$i++)
                    <tr>
                        @for($j=0;$j<5;$j++)
                            <td><input type="number" name="cell{{$i}}{{$j}}" maxlength="4" min="1" max="75" value="{{json_decode($card->numbers)[$j][$i]}}" @if($i!=2 && $j!=2) required @else disabled @endif></td>
                        @endfor
                    </tr>
                @endfor




            </table>

            <div>
                <input type="submit" value="Save Card" class="btn btn-info btn-outline-light">
            </div>

        </form>

    </div>
</div>
            <div class="col-md-6">
                <div class="row">
                @foreach($cards as $card)
                    <div class="col-md-3 m-2 p-2">
                        <div class="card ">
                            <div class="card-header flex-row">Card {{$card->card_name}}

                                <a href="/card/{{$card->id}}/edit" class="btn btn-sm btn-info btn-outline-dark"> <i class="fa fa-pencil"></i>Edit</a>

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
                            <form id="delete-form" action="/card/{{$card->id}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <div class="form-group">
                                    <input type="submit" class="btn btn-danger" value="Delete Card">
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>

        </div>


    <script>

    </script>
</x-app-layout>
