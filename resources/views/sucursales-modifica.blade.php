<x-layouts.app>
    <div>
            <flux:heading size="lg">Modifica sucursales</flux:heading>
            <flux:text class="mt-2">Modifica todos los detalles de las sucursales</flux:text>
        </div>
        <form method="POST" action="{{ route('sucursales.save') }}">
        @csrf
        <flux:input label="Nombre" placeholder="Nombre" wire:model='nombre' value='{{ $sucursal->nombre }}'/>
        <flux:input label="Dirección" placeholder="Dirección" wire:model='direccion' value='{{ $sucursal->direccion }}'/>
        <flux:input label="Telefono" placeholder="Telefono" wire:model='telefono' value='{{ $sucursal->telefono }}'/>
        <flux:input label="Director" placeholder="Director" wire:model='director' value='{{ $sucursal->director }}'/>


        <div class="flex">
            <flux:spacer />

            <flux:button type="submit" variant="primary">Guardar</flux:button>
        </div>
        </form>
</x-layouts.app>