<x-layouts.app>
    <h2>Salas</h2>

    <div class="mb-4">
        <flux:modal.trigger name="agregar-pelicula">
            <flux:button>Agregar Película</flux:button>
        </flux:modal.trigger>
    </div>

    <div>
        <table class="w-full border-collapse table-auto">
            <thead>
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Nombre</th>
                    <th class="border px-4 py-2">Director</th>
                    <th class="border px-4 py-2">Duracion</th>
                    <th class="border px-4 py-2">Genero</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peliculas as $pelicula)
                <tr>
                    <td class="border px-4 py-2">{{ $pelicula->id }}</td>
                    <td class="border px-4 py-2">{{ $pelicula->nombre }}</td>
                    <td class="border px-4 py-2">{{ $pelicula->director }}</td>
                    <td class="border px-4 py-2">{{ $pelicula->duracion }}</td>
                    <td class="border px-4 py-2">{{ $pelicula->genero }}</td>
                    <td class="border px-4 py-2">
                        <form method="POST" action="{{ route('peliculas.delete', $pelicula->id) }}" style="display:inline;">
                            @csrf
                            <flux:button type="submit" variant="danger">Eliminar</flux:button>
                        </form>
                        <flux:brand href="{{ route('peliculas.show', $pelicula->id) }}" name="Modificar" />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modal para agregar película --}}
    <flux:modal name="agregar-pelicula" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Agregar Película</flux:heading>
                <flux:text class="mt-2">Completa los detalles de la película</flux:text>
            </div>

            <form method="POST" action="{{ route('peliculas.save') }}">
                @csrf
                <flux:input label="Nombre" placeholder="Nombre de la película" name="nombre" />
                <flux:input label="Director" placeholder="Director" name="director" />
                <flux:input label="Duración" placeholder="Duración" name="duracion" type="number" />
                <flux:input label="Género" placeholder="Género" name="genero" />

                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">Guardar</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</x-layouts.app>