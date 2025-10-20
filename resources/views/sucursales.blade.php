<x-layouts.app>
    <h2>Sucursales</h2>
    <div>
        <flux:modal.trigger name="edit-profile">
            <flux:button>Agrega Sucursal</flux:button>
        </flux:modal.trigger>
    </div>

    <div>
        <table class="w-full border-collapse table-auto">
            <thead>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Nombre</th>
                    <th class="border px-4 py-2">Dirección</th>
                    <th class="border px-4 py-2">Teléfono</th>
                    <th class="border px-4 py-2">Director</th>
                    <th class="border px-4 py-2">Acciones</th>
            </thead>
            <tbody>
                @foreach($sucursales as $sucursal)
                <tr>
                    <td class="border px-4 py-2">{{ $sucursal->id }}</td>
                    <td class="border px-4 py-2">{{ $sucursal->nombre }}</td>
                    <td class="border px-4 py-2">{{ $sucursal->direccion }}</td>
                    <td class="border px-4 py-2">{{ $sucursal->telefono }}</td>
                    <td class="border px-4 py-2">{{ $sucursal->director }}</td>
                    <td>
                    <form method="POST" action="{{ route('sucursales.delete',$sucursal->id) }}">
                    @csrf
                    <flux:button type="submit">Eliminar</flux:button>
                    </form>
                    <flux:brand href="{{ route('sucursales.show',$sucursal->id) }}"  name="Modificar" /> 
                    </td>
                </tr>
                @endforeach
            </tbody>
    </div>



    <flux:modal name="edit-profile" class="md:w-96">
    <div class="space-y-6">
        <div>
            <flux:heading size="lg">Agregar sucursales</flux:heading>
            <flux:text class="mt-2">Agrega todos los detalles de las sucursales</flux:text>
        </div>
        <form method="POST" action="{{ route('sucursales.save') }}">
        @csrf
        <flux:input label="Nombre" placeholder="Nombre" wire:model='nombre'/>
        <flux:input label="Dirección" placeholder="Dirección" wire:model='direccion'/>
        <flux:input label="Telefono" placeholder="Telefono" wire:model='telefono'/>
        <flux:input label="Director" placeholder="Director" wire:model='director'/>


        <div class="flex">
            <flux:spacer />

            <flux:button type="submit" variant="primary">Guardar</flux:button>
        </div>
        </form>
    </div>
</flux:modal>
</x-layouts.app>