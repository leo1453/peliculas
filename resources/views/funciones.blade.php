<x-layouts.app>
    <h2>Funciones</h2>

    <div class="mb-4">
        <flux:modal.trigger name="agregar-funcion">
            <flux:button>Agregar Función</flux:button>
        </flux:modal.trigger>
    </div>

    <div>
        <table class="w-full border-collapse table-auto">
            <thead>
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Fecha</th>
                    <th class="border px-4 py-2">Película</th>
                    <th class="border px-4 py-2">Sala</th>
                    <th class="border px-4 py-2">Sucursal</th>
                    <th class="border px-4 py-2">Tipo</th>
                    <th class="border px-4 py-2">Costo</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($funciones as $funcion)
                <tr>
                    <td class="border px-4 py-2">{{ $funcion->id }}</td>
                    <td class="border px-4 py-2">{{ $funcion->fecha }}</td>
                    <td class="border px-4 py-2">{{ $funcion->pelicula->nombre ?? 'Sin película' }}</td>
                    <td class="border px-4 py-2">{{ $funcion->sala->nombre ?? 'Sin sala' }}</td>
                    <td class="border px-4 py-2">{{ $funcion->sala->sucursal->nombre ?? 'Sin sucursal' }}</td>
                    <td class="border px-4 py-2">{{ $funcion->tipo }}</td>
                    <td class="border px-4 py-2">${{ number_format($funcion->costo, 2) }}</td>
                    <td class="border px-4 py-2">
                        <form method="POST" action="{{ route('funciones.delete', $funcion->id) }}" style="display:inline;">
                            @csrf
                            <flux:button type="submit" variant="danger">Eliminar</flux:button>
                        </form>
                        <flux:brand href="{{ route('funciones.show', $funcion->id) }}" name="Modificar" />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <flux:modal name="agregar-funcion" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Agregar Función</flux:heading>
                <flux:text class="mt-2">Completa los detalles de la función</flux:text>
            </div>

            <form method="POST" action="{{ route('funciones.save') }}">
                @csrf
                <flux:input label="Fecha y hora" name="fecha" type="datetime-local" />
                <flux:select label="Película" name="pelicula_id">
                    @foreach($peliculas as $pelicula)
                        <option value="{{ $pelicula->id }}">{{ $pelicula->nombre }}</option>
                    @endforeach
                </flux:select>
                <flux:select label="Sala" name="sala_id">
                    @foreach($salas as $sala)
                        <option value="{{ $sala->id }}">{{ $sala->nombre }}</option>
                    @endforeach
                </flux:select>
                <flux:input label="Tipo" name="tipo" placeholder="2D, 3D, VIP..." />
                <flux:input label="Costo" name="costo" type="number" step="0.01" />

                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">Guardar</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</x-layouts.app>
