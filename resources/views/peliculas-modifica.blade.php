<x-layouts.app>
    <div>
        <flux:heading size="lg">Modifica Película</flux:heading>
        <flux:text class="mt-2">Modifica los detalles de la película</flux:text>
    </div>

    <form method="POST" action="{{ route('peliculas.save') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $pelicula->id }}">
        <flux:input label="Nombre" name="nombre" value="{{ $pelicula->nombre }}" />
        <flux:input label="Director" name="director" value="{{ $pelicula->director }}" />
        <flux:input label="Duración" name="duracion" type="number" value="{{ $pelicula->duracion }}" />
        <flux:input label="Género" name="genero" value="{{ $pelicula->genero }}" />
        <div class="flex">
            <flux:spacer />
            <flux:button type="submit" variant="primary">Guardar</flux:button>
        </div>
    </form>
</x-layouts.app>
