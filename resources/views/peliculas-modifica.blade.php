<x-layouts.app>
    <div>
        <flux:heading size="lg">Modifica Pelicula</flux:heading>
        <flux:text class="mt-2">Modifica los detalles de la pelicula</flux:text>
    </div>

    <form method="POST" action="{{ route('peliculas.save') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $pelicula->id }}">

        <flux:input label="Nombre" name="nombre" value="{{ $pelicula->nombre }}" />
        <flux:input label="Director" placeholder="Director" name="director" type="string" value="{{ $pelicula->director }}"/>
        <flux:input label="Duracion" placeholder="Duracion" name="duracion" type="number" value="{{ $pelicula->duracion }}"/>
        <flux:input label="Genero" placeholder="Genero" name="genero" type="string" value="{{ $pelicula->genero }}"/>

        <flux:select label="Sala" name="sala_id">
            @foreach($salas as $sala)
                <option value="{{ $sala->id }}" {{ $pelicula->sala_id == $sala->id ? 'selected' : '' }}>
                    {{ $sala->nombre }}
                </option>
            @endforeach
        </flux:select>

        <div class="flex">
            <flux:spacer />
            <flux:button type="submit" variant="primary">Guardar</flux:button>
        </div>
    </form>
</x-layouts.app>
