<x-app-layout>
    <div class="pt-4 bg-gray-100 dark:bg-gray-900">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
@include('layouts.flash-message')
            </div>



<div class="container"><form method="POST" action="{{ route('newregister') }}">
        @csrf

        <div class="row">
            <h1 class="font-semibold text-2xl p-3 m-3 ">New Agent Registration </h1>
        <div class="col-md-6">
                <div>
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>


                <div class="flex items-center justify-end mt-4">


                </div>
          </div>
        <div class="col-md-6">
        <h2 class="text-2xl text-xl">More Info</h2>
            <div class="mt-4">
                <x-label for="tel" value="{{ __('Telephone Number') }}" />
                <x-input id="tel" class="block mt-1 w-full" type="text" name="tel" required autocomplete="tel" />
            </div>

            <div>
                <x-label for="agent_name" value="{{ __('Agent/Company Name') }}" />
                <x-input id="agent_name" class="block mt-1 w-full" type="text" name="agent_name" :value="old('agent_name')"  autofocus autocomplete="agent_name" />
            </div>
            <div>
                <x-label for="city" value="{{ __('City') }}" />
                <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')"  autofocus autocomplete="city" />
            </div>
              <div>
                <x-label for="location" value="{{ __('Location') }}" />
                <x-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')"  autofocus autocomplete="location" />
            </div>


        </div>
    </div>
        <x-button class="ml-4">
            {{ __('Register') }}
        </x-button>
        </form>
</div>


        </div>
    </div>
</x-app-layout>
