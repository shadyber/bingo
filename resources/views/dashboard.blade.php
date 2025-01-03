<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Game') }}
        </h2>
    </x-slot>

    <div class="items-center row">

        @if(\Illuminate\Support\Facades\Auth::user()->user_type=='admin')

@livewire('admin-dashboard')

 @else

    @if(session()->get('selected_cards')==[])

      <a href="/newgame" class="btn btn-lg btn-info">Select Cards to Play</a>

    @elseif(session()->get('random_numbers')==[])

   <a href="/newgame" class="btn btn-lg btn-warning "> Start New Game</a>

       @else
           @if(\App\Models\Agent::isActive(\Illuminate\Support\Facades\Auth::user()->id))
         @livewire('gameboard')
                @else
               your account is not active
               Please Contact to Main Office.
               @endif

       @endif

@endif

    </div>

</x-app-layout>
