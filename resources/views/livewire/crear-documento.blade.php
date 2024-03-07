<div>
    <form>
        @csrf
        <div class="grid grid-cols-1 gap-y-4 md:grid-cols-2 sm:gap-x-6 sm:gap-y-4">
            <div>

                <!-- Título -->
                <div>
                    <label for="titulo" class="block text-sm font-medium leading-6 text-gray-900">Título</label>
                    <div class="mt-1">
                        <input type="text" wire:model="titulo" id="titulo" autocomplete="titulo"
                            placeholder="Ingrese el título"
                            class="block w-full md:w-2/3 rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>

                <!-- Usuario -->
                <div>
                    <label for="users_id" class="block text-sm font-medium leading-6 text-gray-900">Usuario</label>
                    <select id="users_id" wire:model="users_id"
                        class="block w-full md:w-2/3 rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option selected disabled value="{{ auth()->user()->id }}">{{ auth()->user()->name }}</option>
                    </select>
                </div>

                <!-- Cliente -->
                <div>
                    <label for="clientes_id" class="block text-sm font-medium leading-6 text-gray-900">Cliente</label>
                    <select id="clientes_id" wire:model="clientes_id"
                        class="block w-full md:w-2/3 rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Seleccione el Cliente</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Campos de tipo documentos --}}
            <div>
                <label for="tipos_documentos_id" class="block text-sm font-medium leading-6 text-gray-900">Tipo de
                    Documento</label>
                <select id="tipos_documentos_id" wire:model="tipos_documentos_id"
                    class="block w-full md:w-2/3 rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Seleccione el tipo de documento</option>
                    @foreach ($tiposDocumentos as $tipoDocumento)
                        <option value="{{ $tipoDocumento->id }}">{{ $tipoDocumento->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>

            </div>
        </div>


        <!-- INICIO - BOTÓN DE CREAR Y REGRESAR -->
        <div class="py-4">
            <button
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-2 rounded transition duration-300 ease-in-out transform hover:scale-105"><a
                    href="{{ route('documentos.index') }}">Regresar</a></button>
            <button type="submit"
                class="bg-orange-500 hover:bg-indigo-700 text-white font-bold p-2 rounded transition duration-300 ease-in-out transform hover:scale-105">Crear
                Documento</button>
        </div>
        <!-- FIN - BOTÓN DE CREAR Y REGRESAR -->
    </form>
</div>
