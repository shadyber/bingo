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
                <input type="text" name="card_name" value="{{$card->card_name}}">
            </div>

            <table class="w-full text-2xl text-center p-2 m-1">
                <tr>
                    <td>B</td>
                    <td>I</td>
                    <td>N</td>
                    <td>G</td>
                    <td>O</td>
                </tr>

                @for($i=0;$i<5;$i++)
                    <tr>
                        @for($j=0;$j<5;$j++)
                            <td><input type="number" name="cell{{$i}}{{$j}}" maxlength="4" min="1" max="75" value="{{json_decode($card->numbers)[$j][$i]}}"></td>
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
                List of Other Cards
            </div>

        </div>


    <script>

    </script>
</x-app-layout>
