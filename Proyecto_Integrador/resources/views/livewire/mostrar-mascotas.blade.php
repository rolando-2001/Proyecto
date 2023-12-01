<div class="flex min-h-40 items-center justify-center bg-white">
    <div class="p-6 px-0 overflow-x-auto">
        <table class="w-full min-w-max table-auto text-left border border-collapse bg-white">
            <thead class="bg-dark">
                <tr class="bg-blue-gray-100 text-blue-gray-700">
                    <th class="p-4">Nombre</th>
                    <th class="p-4">Edad</th>
                    <th class="p-4">Raza</th>
                    <th class="p-4">Tipo</th>
                    <th class="p-4">Género</th>
                    <th class="p-4">Fecha</th>
                    <th class="p-4">Descripción</th>
                    <th class="p-4">User ID</th>
                    <th class="p-4">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($mascotas as $mascota)
                    <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-slate-200' }}">
                        <td class="px-5 py-3 border-b border-gray-200">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-16 h-16">
                                    <img class="w-full h-full rounded-full"
                                        src="{{ asset('storage/mascotas/' . $mascota->imagen) }}" alt="" />
                                </div>
                                <div class="ml-3">
                                    <p class="text-gray-800">{{ $mascota->nombre }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="p-4 border-b border-gray-200">{{ $mascota->edad }}</td>
                        <td class="p-4 border-b border-gray-200">{{ $mascota->raza_mascotas_id }}</td>
                        <td class="p-4 border-b border-gray-200">{{ $mascota->tipo_mascotas_id }}</td>
                        <td class="p-4 border-b border-gray-200">{{ $mascota->genero }}</td>
                        <td class="p-4 border-b border-gray-200">{{ $mascota->fecha }}</td>
                        <td class="p-4 border-b border-gray-200">{{ $mascota->descripcion }}</td>
                        <td class="p-4 border-b border-gray-200">{{ $mascota->user_id }}</td>
                        <td class="p-4 border-b border-gray-200">
                            <a href=""
                                class="bg-indigo-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded uppercase mr-2">
                                Candidatos
                            </a>

                            <a href="{{ route('mascota.edit', $mascota->id) }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded uppercase mr-2">
                                Editar
                            </a>
                            <button wire:click="$dispatch('alerta',{ id: {{ $mascota->id }} })" 
                                class="bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded uppercase">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('alerta', mascotaId => {
            Swal.fire({
                title: '¿Está seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: '¡Sí, bórralo!',
            }).then((result) => {
                if (result.isConfirmed) {
                    // eliminado la mascota
                    Livewire.dispatch('EliminarMascota', mascotaId)
                    console.log(mascotaId);
                    Swal.fire(
                        '¡Eliminado!',
                        'Su archivo ha sido eliminado.',
                        'success'
                    );
                }
            });
        });
    </script>
@endpush
