<div>
    <form wire:submit="save">
        <div class="grid grid-cols-1 gap-y-4 md:grid-cols-2 sm:gap-x-6 sm:gap-y-4">
            <div class="space-y-4">

                <!-- Título -->
                <div>
                    <label for="titulo" class="block text-sm font-medium leading-6 text-gray-900">Título</label>
                    <div class="mt-1">
                        <input type="text" wire:model="titulo" id="titulo" autocomplete="titulo"
                            placeholder="Ingrese el título"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    @error('titulo')
                        <div
                            class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                            <p class="text-red-700">{{ $message }}</p>
                        </div>
                    @enderror
                </div>

                <!-- Usuario -->
                <div>
                    <label for="users_id" class="block text-sm font-medium leading-6 text-gray-900">Usuario</label>
                    <select id="users_id" wire:model="users_id"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="{{ auth()->user()->id }}">{{ auth()->user()->name }}</option>
                    </select>
                </div>

                <!-- Cliente -->
                <div>
                    <label for="clientes_id" class="block text-sm font-medium leading-6 text-gray-900">Cliente</label>
                    <select id="clientes_id" wire:model="clientes_id"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Seleccione el Cliente</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                        @endforeach
                    </select>
                    @error('clientes_id')
                        <div
                            class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                            <p class="text-red-700">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
            </div>

            {{-- CAMPOS DINAMICOS DE TIPOS DOCUMENTOS --}}
            <div x-data="{ selectedOption: '{{ $selectedOption }}' }">
                <label for="" class="block">Tipo de Documento</label>
                <select x-model="selectedOption"
                    wire:model="tipo_documento_id"
                    class="block w-full rounded-md border-gray-300 shadow-sm
                     focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    >
                    <option value="" selected>Selecciona el tipo de Documento</option>
                    @foreach ($tiposDocumentos as $key => $tipoDocumento )
                        <option value="{{$tipoDocumento->id}}">{{$tipoDocumento->name}}</option>
                    @endforeach
                </select>
                @error('tipo_documento_id')
                    <div
                        class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                        <p class="text-red-700">{{ $message }}</p>
                    </div>
                @enderror

                <div x-show="selectedOption === '1'" class="mt-4">
                    <div class="flex flex-col md:grid md:grid-cols-2 md:gap-6">
                        <div>
                            <label for="fecha" class="block">Coloque la fecha</label>
                            <input type="date"
                                class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">


                            <label for="empresa_id" class="block">Empresa</label>
                            <select name="" id=""
                                class="block w-full rounded-md border-gray-300 shadow-sm
                            focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mb-2">
                                <option>Seleccione la empresa</option>
                            </select>
                        </div>
                        <div>
                            <label for="cantidad" class="block">Cantidad</label>
                            <input type="number" min="0"
                                class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                            <label for="unidades" class="block">Unidades</label>
                            <input type="number" min="0"
                                class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div class="col-span-2">
                            <label for="descripcion"
                                class="block w-full mb-2 text-sm font-medium text-gray-900">Descripción</label>
                            <textarea id="descripcion" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                placeholder="Agrega una descripción"></textarea>
                        </div>
                    </div>
                </div> {{-- Fin remision --}}


                {{-- Garantia cambios --}}
                <div x-show="selectedOption === 'garantia_cambios' ">
                    <input type="text" name="" id="">
                </div> {{-- Fin garantia cambios --}}


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
