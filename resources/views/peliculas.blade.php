<x-layouts.app>
    <h2>Peliculas</h2>

    <div class="mb-4">
        <flux:modal.trigger name="agregar-pelicula">
            <flux:button>Agregar Pelicula</flux:button>
        </flux:modal.trigger>
            <form action="{{ route('importar.peliculas') }}" method="POST" class="mt-4" enctype="multipart/form-data">
        @csrf
        <flux:input type="file" name="archivo" placeholder="ID de la Pelicula" required />
        <flux:button type="submit" variant="primary">Importar</flux:button>
    </form>
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
                    <th class="border px-4 py-2">Sucursal</th>
                    <th class="border px-4 py-2">Sala</th>
                    <th class="border px-4 py-2">Acciones</th>
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
                    <td class="border px-4 py-2">{{ $pelicula->sala->sucursal->nombre ?? 'Sin sucursal' }}</td>
                    <td class="border px-4 py-2">{{ $pelicula->sala->nombre ?? 'Sin sala' }}</td>
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

    {{-- Modal para agregar sala --}}
    <flux:modal name="agregar-pelicula" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Agregar Pelicula</flux:heading>
                <flux:text class="mt-2">Completa los detalles de la pelicula</flux:text>
            </div>

            <form method="POST" action="{{ route('peliculas.save') }}">
                @csrf
                <flux:input label="Nombre" placeholder="Nombre de la pelicula" name="nombre" />
                <flux:input label="Director" placeholder="Director" name="director" type="string" />
                <flux:input label="Duracion" placeholder="Duracion" name="duracion" type="number" />
                <flux:input label="Genero" placeholder="Genero" name="genero" type="string" />
                <flux:select label="Sala" name="sala_id">
                    @foreach($salas as $sala)
                        <option value="{{ $sala->id }}">{{ $sala->nombre }}</option>
                    @endforeach
                </flux:select>

                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">Guardar</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</x-layouts.app>
