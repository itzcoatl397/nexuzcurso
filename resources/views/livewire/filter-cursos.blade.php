
<div>
    @livewireStyles
    <input wire:model="search" type="text" placeholder="Search users..."/>

    <ul>
        {{ $results }}

    </ul>
    @livewireScripts
</div>
