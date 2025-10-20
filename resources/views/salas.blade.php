<x-layouts.app>
    <h2>Salas</h2>

    <div class="mb-4">
        <flux:modal.trigger name="agregar-sala">
            <flux:button>Agregar Sala</flux:button>
        </flux:modal.trigger>
    </div>

    <div>
        <table class="w-full border-collapse table-auto">
            <thead>
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Nombre</th>
                    <th class="border px-4 py-2">Capacidad</th>
                    <th class="border px-4 py-2">Sucursal</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($salas as $sala)
                <tr>
                    <td class="border px-4 py-2">{{ $sala->id }}</td>
                    <td class="border px-4 py-2">{{ $sala->nombre }}</td>
                    <td class="border px-4 py-2">{{ $sala->capacidad }}</td>
                    <td class="border px-4 py-2">{{ $sala->sucursal->nombre ?? 'Sin sucursal' }}</td>
                    <td class="border px-4 py-2">
                        <form method="POST" action="{{ route('salas.delete', $sala->id) }}" style="display:inline;">
                            @csrf
                            <flux:button type="submit" variant="danger">Eliminar</flux:button>
                        </form>
                        <flux:brand href="{{ route('salas.show', $sala->id) }}" name="Modificar" />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modal para agregar sala --}}
    <flux:modal name="agregar-sala" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Agregar Sala</flux:heading>
                <flux:text class="mt-2">Completa los detalles de la sala</flux:text>
            </div>

            <form method="POST" action="{{ route('salas.save') }}">
                @csrf
                <flux:input label="Nombre" placeholder="Nombre de la sala" name="nombre" />
                <flux:input label="Capacidad" placeholder="Capacidad" name="capacidad" type="number" />

                <flux:select label="Sucursal" name="sucursal_id">
                    @foreach($sucursales as $sucursal)
                        <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
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
