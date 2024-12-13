<div>
    @if($agent->user->user_type=='admin')
    <label class="inline-flex items-center cursor-pointer">
        <input type="checkbox" wire:click="toggleAgent" value="" class="sr-only peer" {{$agent->is_active? "checked" : " "}} >
        <div class="relative w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{$agent->is_active? "Active" : "Disabled"}} </span>
    </label>
    @else
     {{$agent->is_active ? 'Active ' : 'Not Active'}}
    @endif
</div>
