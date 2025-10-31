<x-layouts.app>
    <div>
        <flux:heading size="lg">Modificar Función</flux:heading>
        <flux:text class="mt-2">Edita los detalles de la función</flux:text>
    </div>

    <form method="POST" action="{{ route('funciones.save') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $funcion->id }}">

        <flux:input label="Fecha y hora" name="fecha" type="datetime-local" value="{{ $funcion->fecha }}" />
        <flux:select label="Película" name="pelicula_id">
            @foreach($peliculas as $pelicula)
                <option value="{{ $pelicula->id }}" {{ $funcion->pelicula_id == $pelicula->id ? 'selected' : '' }}>
                    {{ $pelicula->nombre }}
                </option>
            @endforeach
        </flux:select>
        <flux:select label="Sala" name="sala_id">
            @foreach($salas as $sala)
                <option value="{{ $sala->id }}" {{ $funcion->sala_id == $sala->id ? 'selected' : '' }}>
                    {{ $sala->nombre }}
                </option>
            @endforeach
        </flux:select>
        <flux:input label="Tipo" name="tipo" value="{{ $funcion->tipo }}" />
        <flux:input label="Costo" name="costo" type="number" step="0.01" value="{{ $funcion->costo }}" />

        <div class="flex">
            <flux:spacer />
            <flux:button type="submit" variant="primary">Guardar Cambios</flux:button>
        </div>
    </form>
</x-layouts.app>
