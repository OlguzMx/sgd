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

                    </div> {{-- Fin remision --}}
                    <!-- FIN - Tipo documento: Remisión -->

                    {{-- INICIO - Tipo documento: Cotización --}}

                    {{-- FIN - Tipo documento: Cotización --}}

                    {{-- INICIO - Tipo documento: Orden de compra --}}
                    <div x-show="selectedOption === '3' ">
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
                            <div>
                                <label for="proveedores_id" class="block">Proveedor</label>
                                <select wire:model="proveedores_id" id="proveedores_id" class="block w-full rounded-md border-gray-300 shadow-sm
                            focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mb-2">
                                    <option>Seleccione el proveedor</option>
                                    @foreach ($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id }}">{{ $proveedor->name }}</option>
                                    @endforeach
                                </select>
                                @error('proveedores_id')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="num_orden_compra" class="block">Número de orden de compra</label>
                                <input type="text" wire:model="num_orden_compra" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('num_orden_compra')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="nombre_proyecto" class="block">Nombre del proyecto</label>
                                <input type="text" wire:model="nombre_proyecto" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('nombre_proyecto')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="tiempo_entrega" class="block">Tiempo de entrega</label>
                                <input type="text" wire:model="tiempo_entrega" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('tiempo_entrega')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="moneda" class="block">Moneda</label>
                                <input type="text" wire:model="moneda" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('moneda')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <h4 class="col-span-2 text-center font-semibold text-orange-500">Agregue las veces que requiera</h4>
                            <div>
                                {{-- CAMPOS DINÁMICOS DE TABLA detalles_entrada_almacen - EQUIPO DAÑADO --}}
                                <label for="cantidad" class="block">Cantidad</label>
                                <input id="cantidad" wire:model="cantidad" type="number" min="0" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('cantidad')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                                <label for="precio_unitario" class="block">Precio Unitario</label>
                                <input wire:model="precio_unitario" type="text" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('precio_unitario')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div>
                                {{-- CAMPOS DINÁMICOS DE TABLA detalles_entrada_almacen - EQUIPO REEMPLAZO --}}
                                <label for="num_de_parte" class="block">Núm. de parte</label>
                                <input id="num_de_parte" wire:model="num_de_parte" type="text" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('num_de_parte')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                                <label for="importe" class="block">Importe</label>
                                <input id="importe" wire:model="importe" type="number" min="0" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('importe')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="descripcion" class="block">Descripción</label>
                                <textarea wire:model="descripcion" id="descripcion" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                @error('descripcion')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                        </div>

                        {{-- BOTÓN PARA ALMACENAR EN EL ARRAY DE DETALLES DOCUMENTOS --}}
                        <button class="my-3 text-orange-500 border-b-2 border-b-orange-200/30 hover:border-b-orange-400" type="button" wire:click='detallesOrdenCompra'>
                            Agregar campos
                        </button>
                    </div>
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
                            <div class="col-span-2">
                                <label for="descripcion" class="block">Descripción</label>
                                <textarea wire:model="descripcion" id="descripcion" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                @error('descripcion')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div>
                                {{-- CAMPOS DINÁMICOS DE TABLA detalles_garantias_cambios - EQUIPO DAÑADO --}}
                                <label for="marca_danado" class="block">Marca (Equipo dañado)</label>
                                <input id="marca_danado" wire:model="marca_danado" type="text" placeholder="Ej: Aruba, Fortinet, etc." class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('marca_danado')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                                <label for="modelo_danado" class="block">Modelo (Equipo dañado)</label>
                                <input id="modelo_danado" wire:model="modelo_danado" type="text" placeholder="Eje: AP-505" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('modelo_danado')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                                <label for="num_serie_danado" class="block">Núm. de serie (Equipo dañado)</label>
                                <input id="num_serie_danado" wire:model="num_serie_danado" type="text" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('num_serie_danado')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror

                            </div>
                            <div>
                                {{-- CAMPOS DINÁMICOS DE TABLA detalles_garantias_cambios - EQUIPO REEMPLAZO --}}
                                <label for="marca_reemplazo" class="block">Marca (Equipo reemplazo)</label>
                                <input id="marca_reemplazo" wire:model="marca_reemplazo" type="text" placeholder="Ej: Aruba, Fortinet, etc." class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('marca_reemplazo')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                                <label for="modelo_reemplazo" class="block">Modelo (Equipo reemplazo)</label>
                                <input id="modelo_reemplazo" wire:model="modelo_reemplazo" type="text" placeholder="Eje: AP-505" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('modelo_reemplazo')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                                <label for="num_serie_reemplazo" class="block">Núm. de serie (Equipo reemplazo)</label>
                                <input id="num_serie_reemplazo" wire:model="num_serie_reemplazo" type="text" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('num_serie_reemplazo')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                                <label for="num_inventario" class="block">Núm. de Inventario</label>
                                <input id="num_inventario" wire:model="num_inventario" type="text" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('num_inventario')
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
                    </div> {{-- Fin garantia cambios --}}
                    {{-- FIN - Tipo documento: Garantía y/o cambio de equipo --}}

                    {{-- INICIO - Tipo documento: Entrada de Mat/Eq a bodega --}}
                    <div x-show="selectedOption === '5' ">
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
                                <label for="name_cliente" class="block">Nombre del cliente</label>
                                <input type="text" wire:model="name_cliente" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('name_cliente')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="puesto_cliente" class="block">Puesto</label>
                                <input type="text" wire:model="puesto_cliente" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('puesto_cliente')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="empresa_cliente" class="block">Empresa</label>
                                <input type="text" wire:model="empresa_cliente" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('empresa_cliente')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <h4 class="col-span-2 text-center font-semibold text-orange-500">Agregue las veces que
                                requiera</h4>
                            <div>
                                {{-- CAMPOS DINÁMICOS DE TABLA detalles_entrada_almacen - EQUIPO DAÑADO --}}
                                <label for="cantidad" class="block">Cantidad</label>
                                <input id="cantidad" wire:model="cantidad" type="number" min="0" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('cantidad')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                                <label for="modelo" class="block">Modelo</label>
                                <input id="modelo" wire:model="modelo" type="text" placeholder="Eje: AP-505" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('modelo')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div>
                                {{-- CAMPOS DINÁMICOS DE TABLA detalles_entrada_almacen - EQUIPO REEMPLAZO --}}
                                <label for="marca" class="block">Marca</label>
                                <input id="marca" wire:model="marca" type="text" placeholder="Ej: Aruba, Fortinet, etc." class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('marca')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                                <label for="num_de_parte" class="block">Núm. de parte</label>
                                <input id="num_de_parte" wire:model="num_de_parte" type="text" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('num_de_parte')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="descripcion" class="block">Descripción</label>
                                <textarea wire:model="descripcion" id="descripcion" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                @error('descripcion')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                        </div>

                        {{-- BOTÓN PARA ALMACENAR EN EL ARRAY DE DETALLES DOCUMENTOS --}}
                        <button class="my-3 text-orange-500 border-b-2 border-b-orange-200/30 hover:border-b-orange-400" type="button" wire:click='detallesEntradaAlmacen'>
                            Agregar campos
                        </button>
                    </div>
                    {{-- FIN - Tipo documento: Entrada de Mat/Eq a bodega --}}

                    {{-- INICIO - Tipo documento: Salida de Mat/Eq a bodega --}}
                    <div x-show="selectedOption === '6' ">
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
                                <label for="name_cliente" class="block">Nombre del cliente</label>
                                <input type="text" wire:model="name_cliente" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('name_cliente')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="puesto_cliente" class="block">Puesto</label>
                                <input type="text" wire:model="puesto_cliente" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('puesto_cliente')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="empresa_cliente" class="block">Empresa</label>
                                <input type="text" wire:model="empresa_cliente" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('empresa_cliente')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <h4 class="col-span-2 text-center font-semibold text-orange-500">Agregue las veces que
                                requiera</h4>
                            <div>
                                {{-- CAMPOS DINÁMICOS DE TABLA detalles_entrada_almacen - EQUIPO DAÑADO --}}
                                <label for="cantidad" class="block">Cantidad</label>
                                <input id="cantidad" wire:model="cantidad" type="number" min="0" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('cantidad')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                                <label for="modelo" class="block">Modelo</label>
                                <input id="modelo" wire:model="modelo" type="text" placeholder="Eje: AP-505" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('modelo')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div>
                                {{-- CAMPOS DINÁMICOS DE TABLA detalles_entrada_almacen - EQUIPO REEMPLAZO --}}
                                <label for="marca" class="block">Marca</label>
                                <input id="marca" wire:model="marca" type="text" placeholder="Ej: Aruba, Fortinet, etc." class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('marca')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                                <label for="num_de_parte" class="block">Núm. de parte</label>
                                <input id="num_de_parte" wire:model="num_de_parte" type="text" class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('num_de_parte')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="descripcion" class="block">Descripción</label>
                                <textarea wire:model="descripcion" id="descripcion" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                @error('descripcion')
                                <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                    <p class="text-red-700">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                        </div>

                        {{-- BOTÓN PARA ALMACENAR EN EL ARRAY DE DETALLES DOCUMENTOS --}}
                        <button class="my-3 text-orange-500 border-b-2 border-b-orange-200/30 hover:border-b-orange-400" type="button" wire:click='detallesSalidaAlmacen'>
                            Agregar campos
                        </button>
                    </div>
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