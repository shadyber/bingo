<x-app-layout>
    <div class="pt-4 bg-gray-100 dark:bg-gray-900">
        <div class="min-h-screen flex flex-col items-center">

            <div class="w-full sm:max-w-2xl   bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg prose dark:prose-invert">
                <form action="/card" method="post">
                    @csrf

                    <div class="col-md-6 p-2 m-2">
                        <label for="card_name">Card Name</label>
                        <input type="text" name="card_name">
                    </div>

                <table class="w-full text-2xl text-center p-2 m-1">
                    <tr>
                        <td>B</td>
                        <td>I</td>
                        <td>N</td>
                        <td>G</td>
                        <td>O</td>
                    </tr>

                    <tr>
                        <td><input type="number" name="cell00" maxlength="4" min="1" max="15"></td>
                        <td><input type="number" name="cell10"  maxlength="4" min="16" max="30"></td>
                        <td><input type="number" name="cell20" min="31" max="45"></td>
                        <td><input type="number" name="cell30" min="46" max="60"></td>
                        <td><input type="number" name="cell40" min="61" max="75"></td>

                    </tr>
                    <tr>
                        <td><input type="number" name="cell01" maxlength="4" min="1" max="15"></td>
                        <td><input type="number" name="cell11"  maxlength="4" min="16" max="30"></td>
                        <td><input type="number" name="cell21" min="31" max="45"></td>
                        <td><input type="number" name="cell31" min="46" max="60"></td>
                        <td><input type="number" name="cell41" min="61" max="75"></td>

                    </tr>
    <tr>
                        <td><input type="number" name="cell02" maxlength="4" min="1" max="15"></td>
                        <td><input type="number" name="cell12"  maxlength="4" min="16" max="30"></td>
                         <td><input type="number" name="cell22" value="FREE" disabled class="bg-danger" maxlength="4" min="16" max="30"></td>

                        <td><input type="number" name="cell32" min="46" max="60"></td>
                        <td><input type="number" name="cell42" min="61" max="75"></td>

                    </tr>





                    <tr>
                        <td><input type="number" name="cell03" maxlength="4" min="1" max="15"></td>
                        <td><input type="number" name="cell13"  maxlength="4" min="16" max="30"></td>
                        <td><input type="number" name="cell23" min="31" max="45"></td>
                        <td><input type="number" name="cell33" min="46" max="60"></td>
                        <td><input type="number" name="cell43" min="61" max="75"></td>

                    </tr>

                    <tr>
                        <td><input type="number" name="cell04" maxlength="4" min="1" max="15"></td>
                        <td><input type="number" name="cell14"  maxlength="4" min="16" max="30"></td>
                        <td><input type="number" name="cell24" min="31" max="45"></td>
                        <td><input type="number" name="cell34" min="46" max="60"></td>
                        <td><input type="number" name="cell44" min="61" max="75"></td>

                    </tr>




                </table>

                    <div>
                        <input type="submit" value="Save Card" class="btn btn-info btn-outline-light">
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script>

    </script>
</x-app-layout>
