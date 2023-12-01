<section class="max-w-4xl p-6 mx-auto bg-white-600 rounded-md shadow-2xl border border-gray-300 mt-2">
    <h1 class="text-xl font-bold text-dark capitalize dark:text-dark">Editando </h1>

    <form wire:submit.prevent='editarMascota'>
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">

            <div>
                <label class=" dark:text-gray-800    uppercase" for="nombre">Nombre</label>
                <input id="nombre" type="text" wire:model="nombre"
                    class="block w-full px-4 py-2 mt-2 
                text-gray-700 bg-white border border-gray-300 rounded-md white:bg-gray-800 
                dark:text-dark-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                @error('nombre')
                    <livewire:mostrar-alerta :message="$message" />
                @enderror
            </div>


            <div>
                <label class="text-dark dark:text-gray-800  uppercase" for="edad">Edad</label>
                <input id="edad" type="number" wire:model="edad"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300
                 rounded-md white:bg-gray-800 dark:text-dark-300 dark:border-gray-600 focus:border-blue-500
                 dark:focus:border-blue-500 focus:outline-none focus:ring">

                @error('edad')
                    <livewire:mostrar-alerta :message="$message" />
                @enderror
            </div>


            <div>
                <label class="text-dark dark:text-gray-800  uppercase" for="raza">Raza Mascota</label>
                <select id="raza" wire:model="raza"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md 
                     white:bg-gray-800 dark:text-dark-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 
                     focus:outline-none focus:ring">

                    <option>--seleccione--</option>

                    @foreach ($razasMascota as $raza)
                        <option value="{{ $raza->id }}">{{ $raza->raza }}</option>
                    @endforeach
                </select>
                @error('raza')
                    <livewire:mostrar-alerta :message="$message" />
                @enderror
            </div>

            <div>
                <label class="text-dark dark:text-gray-800 uppercase" for="especie">Tipo Mascota</label>

                <select id="especie" wire:model="especie"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md
                        white:bg-gray-800 dark:text-dark-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500
                        focus:outline-none focus:ring">

                    <option>--seleccione--</option>

                    @foreach ($tiposMascota as $mascota)
                        <option value="{{ $mascota->id }}">{{ $mascota->especie }}</option>
                    @endforeach
                </select>
                @error('especie')
                    <livewire:mostrar-alerta :message="$message" />
                @enderror
            </div>



            <div>
                <label class="text-dark dark:text-gray-800  uppercase" for="genero">genero</label>
                <select id="genero" wire:model="genero"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md 
                     white:bg-gray-800 dark:text-dark-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 
                     focus:outline-none focus:ring">
                    <option>--seleccione--</option>
                    <option>Hembra</option>
                    <option>Macho</option>

                </select>
                @error('genero')
                    <livewire:mostrar-alerta :message="$message" />
                @enderror
            </div>

            <div>
                <label class="text-dark dark:text-gray-800  uppercase" for="fecha">Date</label>
                <input id="fecha" type="date" wire:model="fecha"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md white:bg-gray-800
             dark:text-dark-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                @error('fecha')
                    <livewire:mostrar-alerta :message="$message" />
                @enderror
            </div>

            <div>
                <label class="text-dark dark:text-gray-800  uppercase" for="descripcion">descripcion</label>
                <textarea id="descripcion" type="textarea" wire:model="descripcion"
                    class="block  w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md white:bg-gray-800 dark:text-dark-300 
             dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></textarea>
                @error('descripcion')
                    <livewire:mostrar-alerta :message="$message" />
                @enderror
            </div>


            <div>
                <label class="block text-sm font-medium text-dark uppercase">
                    Imagen
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md relative">
                    <!-- Mostrar la nueva imagen si existe -->
                    @if ($nueva_imagen)
                        <img src="{{ $nueva_imagen->temporaryUrl() }}" alt="Nueva imagen seleccionada" class="mx-auto h-32 w-auto object-cover rounded-md shadow-lg"">
                    @elseif ($imagen)
                        <!-- Mostrar la imagen actual si no hay nueva imagen -->
                        <img src="{{ asset('storage/mascotas/' . $imagen) }}" alt="Imagen actual" class="mx-auto h-32 w-auto object-cover rounded-md shadow-lg"">
                    @endif
            
                    <!-- Botón para cargar nueva imagen -->
                    <label for="nuevaImagen" class="absolute bottom-0 right-0 p-2 bg-indigo-500 text-white cursor-pointer">
                        Cargar nueva imagen
                        <input id="nuevaImagen" wire:model="nueva_imagen" type="file" class="sr-only" accept="image/*">
                    </label>
                </div>
            </div>
            
        
        <div class="flex justify-end mt-6">


            <button
                class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform  uppercase
                   bg-blue-500 rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-600"
                type="submit">Actualizar</button>

        </div>
        </div>


    </form>
</section>

