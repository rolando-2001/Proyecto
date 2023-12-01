<section class="max-w-4xl p-6 mx-auto bg-white-600 rounded-md shadow-2xl border border-gray-300 mt-2">
    <h1 class="text-xl font-bold text-dark capitalize dark:text-dark">Agregar una Mascota</h1>

    <form wire:submit.prevent='crearMascota'>
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
                    @if ($imagen)
                        <img src="{{ $imagen->temporaryUrl() }}" alt="Imagen seleccionada"
                             class="mx-auto h-32 w-auto object-cover rounded-md shadow-lg">
                    @else
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-dark" stroke="currentColor" fill="none"
                                 viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4
                             4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="imagen"
                                       class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500
                                        focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span class="">Cargar un archivo</span>
                                    <input id="imagen" wire:model="imagen" type="file" class="sr-only" accept="image/*">
                                </label>
                                <p class="pl-1 text-dark">o arrastrar y soltar</p>
                            </div>
                            <p class="text-xs text-dark">
                                PNG, JPG, GIF hasta 10MB
                            </p>
                        </div>
                    @endif
                </div>
                @error('imagen')
                    <livewire:mostrar-alerta :message="$message" />
                @enderror
            </div>
        

        </div>


        <div class="flex justify-end mt-6">
            <div class="flex space-x-4">
                <button
                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform uppercase
         bg-red-500 rounded-md hover:bg-red-700 focus:outline-none focus:bg-red-600">Cancelar</button>

                <button
                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform  uppercase
                   bg-blue-500 rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-600">Registrar</button>

            </div>
        </div>


    </form>
</section>
