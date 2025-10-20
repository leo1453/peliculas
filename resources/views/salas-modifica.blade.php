<x-layouts.app>
    <div>
        <flux:heading size="lg">Modifica Sala</flux:heading>
        <flux:text class="mt-2">Modifica los detalles de la sala</flux:text>
    </div>

    <form method="POST" action="{{ route('salas.save') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $sala->id }}">

        <flux:input label="Nombre" name="nombre" value="{{ $sala->nombre }}" />
        <flux:input label="Capacidad" name="capacidad" type="number" value="{{ $sala->capacidad }}" />

        <flux:select label="Sucursal" name="sucursal_id">
            @foreach($sucursales as $sucursal)
                <option value="{{ $sucursal->id }}" {{ $sala->sucursal_id == $sucursal->id ? 'selected' : '' }}>
                    {{ $sucursal->nombre }}
                </option>
            @endforeach
        </flux:select>

        <div class="flex">
            <flux:spacer />
            <flux:button type="submit" variant="primary">Guardar</flux:button>
        </div>
    </form>
</x-layouts.app>
