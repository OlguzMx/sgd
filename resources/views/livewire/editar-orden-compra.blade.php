<div>
    <form wire:submit="editarOrdenCompra">
        <div class="gap-y-4 sm:gap-x-6 sm:gap-y-4">
            <h3 class="font-semibold uppercase my-2">Documento de <span
                    class="text-orange-400">{{ $documento->tipo_documento->name }}</span></h3>
            <div class="grid grid-cols-2 gap-8">
                <div>
                    <label for="users_id" class="block text-sm font-medium leading-6 text-gray-900">Usuario</label>
                    <select id="users_id" wire:model="users_id"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="{{ $documento->user->id }}">{{ $documento->user->name }}</option>
                    </select>
                </div>

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
                <div>
                    <label for="empresas_id" class="block">Empresa</label>
                    <select wire:model="empresas_id" id="empresas_id"
                        class="block w-full rounded-md border-gray-300 shadow-sm
                    focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mb-2">
                        <option>Seleccione la empresa</option>
                        @foreach ($empresas as $empresa)
                            <option value="{{ $empresa->id }}">{{ $empresa->name }}</option>
                        @endforeach
                    </select>
                    @error('empresas_id')
                        <div
                            class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                            <p class="text-red-700">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="proveedores_id" class="block">Proveedor</label>
                    <select wire:model="proveedores_id" id="proveedores_id"
                        class="block w-full rounded-md border-gray-300 shadow-sm
                    focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mb-2">
                        <option>Seleccione el proveedor</option>
                        @foreach ($proveedores as $proveedor)
                            <option value="{{ $proveedor->id }}">{{ $proveedor->name }}</option>
                        @endforeach
                    </select>
                    @error('proveedores_id')
                        <div
                            class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                            <p class="text-red-700">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="num_orden_compra" class="block text-sm font-medium leading-6 text-gray-900">Núm. Orden de compra</label>
                    <input id="num_orden_compra" wire:model="num_orden_compra"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('num_orden_compra')
                        <div
                            class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                            <p class="text-red-700">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="nombre_proyecto" class="block text-sm font-medium leading-6 text-gray-900">Nombre del proyecto</label>
                    <input id="nombre_proyecto" wire:model="nombre_proyecto"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('nombre_proyecto')
                        <div
                            class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                            <p class="text-red-700">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="tiempo_entrega" class="block text-sm font-medium leading-6 text-gray-900">Tiempo de entrega</label>
                    <input id="tiempo_entrega" wire:model="tiempo_entrega"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('tiempo_entrega')
                        <div
                            class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                            <p class="text-red-700">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                
                <div>
                    <label for="fecha" class="block">Fecha</label>
                    <input type="date" wire:model="fecha"
                        class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('fecha')
                        <div
                            class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                            <p class="text-red-700">{{ $message }}</p>
                        </div>
                    @enderror

                </div>
            </div>
            <h4 class="text-center font-semibold text-orange-400 text-lg my-4">
                Detalles de {{ $documento->orden_compra->id }}
            </h4>
            <h4 class="text-center font-semibold text-lg my-4">
                Equipo Dañado
            </h4>
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Detalle</th>
                            <th class="px-4 py-2">Cantidad</th>
                            <th class="px-4 py-2">Num. de Parte</th>
                            <th class="px-4 py-2">Descripción</th>
                            <th class="px-4 py-2">Precio Unitario</th>
                            <th class="px-4 py-2">Importe</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalles as $index => $detalle)
                            <tr>
                                <td class="border px-4 py-2">{{ $index }}</td>
                                <td class="border px-4 py-2">
                                    <input id="cantidad_{{ $index }}" type="text" class="w-full rounded-md"
                                        wire:model.defer="new_detalles.{{ $index }}.cantidad_{{ $index }}"
                                        value="{{ $new_detalles[$index]['cantidad_' . $index] }}" />
                                </td>
                                <td class="border px-4 py-2">
                                    <input 
                                        id="num_de_parte_{{ $index }}" type="text" class="w-full rounded-md"
                                        wire:model.defer="new_detalles.{{ $index }}.num_de_parte_{{ $index }}"
                                        value="{{ $new_detalles[$index]['num_de_parte_' . $index] }}" />
                                </td>
                                <td class="border px-4 py-2">
                                    <input 
                                        id="descripcion_{{ $index }}" type="text" class="w-full rounded-md"
                                        wire:model.defer="new_detalles.{{ $index }}.descripcion_{{ $index }}"
                                        value="{{ $new_detalles[$index]['descripcion_' . $index] }}" />
                                </td>
                                <td class="border px-4 py-2">
                                    <input 
                                        id="precio_unitario_{{ $index }}" type="text" class="w-full rounded-md"
                                        wire:model.defer="new_detalles.{{ $index }}.precio_unitario_{{ $index }}"
                                        value="{{ $new_detalles[$index]['precio_unitario_' . $index] }}" />
                                </td>
                                <td class="border px-4 py-2">
                                    <input 
                                        id="importe_{{ $index }}" type="text" class="w-full rounded-md"
                                        wire:model.defer="new_detalles.{{ $index }}.importe_{{ $index }}"
                                        value="{{ $new_detalles[$index]['importe_' . $index] }}" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <button type="submit" class="block my-2 rounded-md bg-orange-500 px-2 py-1 text-white w-20">
                    Editar
                </button>
    </form>
    <div class="pt-4">
        <button
            class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-2 rounded transition duration-300 ease-in-out transform hover:scale-105"><a
                href="{{ route('documentos.index') }}">Regresar</a></button>
    </div>
</div>

