<div>
    <form wire:submit="save">
        <div class="grid grid-cols-1 gap-y-4 sm:gap-x-6 sm:gap-y-4">
            <div class="space-y-4">
                <!-- INICIO - Usuario -->

                <!-- el wire:model='' es igual al name='' -->
                <div>
                    <label for="users_id" class="block text-sm font-medium leading-6 text-gray-900">Usuario</label>
                    <select id="users_id" wire:model="users_id" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="{{ auth()->user()->id }}">{{ auth()->user()->name }}</option>
                    </select>
                </div>
                <!-- FIN - Usuario -->

                <!-- INICIO - Cliente -->
                <div>
                    <label for="clientes_id" class="block text-sm font-medium leading-6 text-gray-900">Cliente</label>
                    <select id="clientes_id" wire:model="clientes_id" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Seleccione el Cliente</option>
                        @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                        @endforeach
                    </select>
                    @error('clientes_id')
                    <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                        <p class="text-red-700">{{ $message }}</p>
                    </div>
                    @enderror
                </div>
                <!-- FIN - Cliente -->

                {{-- CAMPOS DINAMICOS DE TIPOS DOCUMENTOS --}}
                <div x-data="{ selectedOption: '{{ $selectedOption }}' }">
                    <label for="" class="block">Tipo de Documento</label>
                    <select x-model="selectedOption" wire:model="tipo_documento_id" class="block w-full rounded-md border-gray-300 shadow-sm
                     focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="" selected>Selecciona el tipo de Documento</option>
                        @foreach ($tiposDocumentos as $key => $tipoDocumento)
                        <option value="{{ $tipoDocumento->id }}">{{ $tipoDocumento->name }}</option>
                        @endforeach
                    </select>
                    @error('tipo_documento_id')
                    <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                        <p class="text-red-700">{{ $message }}</p>
                    </div>
                    @enderror
                    <!-- INICIO - Tipo documento: Remisión -->
                    <div x-show="selectedOption === '1'" class="mt-4">
                        <div class="flex flex-col md:grid md:grid-cols-2 md:gap-6">
                            <div>
                                <label for="fecha" class="block">Coloque la fecha</label>
                                <input type="date" wire:model="fecha" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('fecha')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror

                            </div>
                            <div>
                                <label for="empresas_id" class="block">Empresa</label>
                                <select wire:model="empresas_id" id="empresas_id" class="block w-full rounded-md border-gray-300 shadow-sm
                                focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mb-2">
                                    <option>Seleccione la empresa</option>
                                    @foreach ($empresas as $empresa)
                                    <option value="{{ $empresa->id }}">{{ $empresa->name }}</option>
                                    @endforeach
                                </select>
                                @error('empresas_id')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>

                            {{-- CAMPOS DINÁMICOS DE TABLA detalles_remision --}}
                            <h4 class="col-span-2 text-center font-semibold text-orange-500">Agregue las veces que
                                requiera</h4>
                            <div>
                                <label for="cantidad" class="block">Cantidad</label>
                                <input id="cantidad" wire:model="cantidad" type="number" min="0" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('cantidad')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="unidad" class="block">Unidad</label>
                                <input wire:model="unidad" type="text" placeholder="Eje: Servicio" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('unidad')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="descripcion" class="block w-full mb-2 text-sm font-medium text-gray-900">Descripción</label>
                                <textarea wire:model="descripcion" id="descripcion" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Agrega una descripción"></textarea>
                                @error('descripcion')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>


                        </div>
                        {{-- BOTÓN PARA ALMACENAR EN EL ARRAY DE DETALLES DOCUMENTOS --}}
                        <button class="my-3 text-orange-500 border-b-2 border-b-orange-200/30 hover:border-b-orange-400" type="button" wire:click='detallesDocumentos'>
                            Agregar campos
                        </button>

                        {{-- Tabla --}}
                        <table class="min-w-full border rounded overflow-hidden">
                            <thead class="bg-cyan-500 text-white">
                                <tr>
                                    <th class="px-6 py-3 text-left font-semibold uppercase">Cantidad</th>
                                    <th class="px-6 py-3 text-left font-semibold uppercase">Unidad</th>
                                    <th class="px-6 py-3 text-left font-semibold uppercase">Descripcion</th>
                                </tr>
                            </thead>

                            <tbody id="listado-proveedores" class="bg-slate-50 hover:bg-slate-100">
                                {{-- @foreach ($Cliente as $cliente) --}}
                                {{-- <tr class="border-t hover:bg-gray-100" id="cliente_{{ $cliente->id }}">
                                <td class="px-6 py-4">{{ $cliente->name }}</td>
                                <td class="px-6 py-4">{{ $cliente->email }}</td>
                                <td class="px-6 py-4">

                                    <!-- INICIO - BOTONES DE EDITAR Y ELIMINAR CLIENTE -->

                                    <div class="flex items-center gap-4">
                                        <a href="{{ route('clientes.edit', $cliente->id) }}" title="Editar el Cliente" class="bg-green-500 hover:bg-green-600 text-white p-1 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>
                                        <a href="#" title="Eliminar al Cliente" class="bg-red-500 hover:bg-red-600 text-white p-1 rounded" onclick="deleteCliente({{ $cliente->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </a>
                                    </div>

                                    <!-- FIN - BOTONES DE EDITAR Y ELIMINAR CLIENTE -->

                                </td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div> {{-- Fin remision --}}
                    <!-- FIN - Tipo documento: Remisión -->

                    {{-- INICIO - Tipo documento: Cotización --}}

                    {{-- FIN - Tipo documento: Cotización --}}

                    {{-- INICIO - Tipo documento: Orden de compra --}}

                    {{-- FIN - Tipo documento: Orden de compra --}}

                    {{-- INICIO - Tipo documento: Garantía y/o cambio de equipo --}}
                    <div x-show="selectedOption === '4' ">
                        <div class="flex flex-col md:grid md:grid-cols-2 md:gap-6">
                            <div>
                                <label for="fecha" class="block">Coloque la fecha</label>
                                <input type="date" wire:model="fecha" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('fecha')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                                <label for="empresas_id" class="block">Empresa</label>
                                <select wire:model="empresas_id" id="empresas_id" class="block w-full rounded-md border-gray-300 shadow-sm
                            focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mb-2">
                                    <option>Seleccione la empresa</option>
                                    @foreach ($empresas as $empresa)
                                    <option value="{{ $empresa->id }}">{{ $empresa->name }}</option>
                                    @endforeach
                                </select>
                                @error('empresas_id')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror

                                {{-- CAMPOS DINÁMICOS DE TABLA detalles_garantias_cambios --}}
                                <label for="num_inventario" class="block">Núm. de Inventario</label>
                                <input wire:model="num_inventario" type="text" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('num_inventario')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="num_serie_danado" class="block">Núm. de serie dañado</label>
                                <input id="num_serie_danado" wire:model="num_serie_danado" type="text" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('num_serie_danado')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                                <label for="num_serie_reemplazo" class="block">Núm. de serie reemplazo</label>
                                <input wire:model="num_serie_reemplazo" type="text" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('num_serie_reemplazo')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                                <label for="marca" class="block">Marca</label>
                                <input id="marca" wire:model="marca" type="text" placeholder="Ej: Aruba, Fortinet, etc." class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('marca')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="modelo" class="block">Modelo</label>
                                <input wire:model="modelo" type="text" placeholder="Eje: AP-505" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('modelo')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror

                            </div>
                        </div>

                        {{-- BOTÓN PARA ALMACENAR EN EL ARRAY DE DETALLES DOCUMENTOS --}}
                        <button class="my-3 text-orange-500 border-b-2 border-b-orange-200/30 hover:border-b-orange-400" type="button" wire:click='detallesGarantiaCambios'>
                            Agregar campos
                        </button>

                        {{-- Tabla --}}
                        <table class="min-w-full border rounded overflow-hidden">
                            <thead class="bg-cyan-500 text-white">
                                <tr>
                                    <th class="px-6 py-3 text-left font-semibold uppercase">Cantidad</th>
                                    <th class="px-6 py-3 text-left font-semibold uppercase">Unidad</th>
                                    <th class="px-6 py-3 text-left font-semibold uppercase">Descripcion</th>
                                </tr>
                            </thead>

                            <tbody id="listado-proveedores" class="bg-slate-50 hover:bg-slate-100">

                            </tbody>
                        </table>
                    </div> {{-- Fin garantia cambios --}}
                    {{-- FIN - Tipo documento: Garantía y/o cambio de equipo --}}

                    {{-- INICIO - Tipo documento: Entrada de Mat/Eq a bodega --}}

                    {{-- FIN - Tipo documento: Entrada de Mat/Eq a bodega --}}

                    {{-- INICIO - Tipo documento: Salida de Mat/Eq a bodega --}}

                    {{-- FIN - Tipo documento: Salida de Mat/Eq a bodega --}}

                </div>
            </div>
        </div>


        <!-- INICIO - BOTÓN DE CREAR Y REGRESAR -->
        <div class="py-4">
            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-2 rounded transition duration-300 ease-in-out transform hover:scale-105"><a href="{{ route('documentos.index') }}">Regresar</a></button>
            <button type="submit" class="bg-orange-500 hover:bg-indigo-700 text-white font-bold p-2 rounded transition duration-300 ease-in-out transform hover:scale-105">Crear
                Documento</button>
        </div>
        <!-- FIN - BOTÓN DE CREAR Y REGRESAR -->
    </form>


</div>