@section('titulo')
    Proveedores
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SGD - Proveedores') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- INICIO - VISTA DE PROVEEDORES -->

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-8 py-2">

                <!-- INICIO - CONTEO DE PROVEEDORES -->

                <h2 class="text-3xl font-light text-center font-mono">{{ $ProveedoresCount }}
                    <span class="font-normal"> @choice('Proveedor|Proveedores',$ProveedoresCount )</span>
                </h2>
                 {{-- Importar alerta --}}
                 <livewire:alerta />

                <!-- FIN - CONTEO DE PROVEEDORES -->

                <div class="flex flex-col mt-10">
                    <div class="py-2 overflow-x-auto">

                        <!-- INICIO - BOTÓN DE CREAR PROVEEDORES -->

                        <div class="flex items-center gap-4 mb-3">
                    <a href="{{ route('proveedores.create') }}" class="uppercase text-sm font-semibold bg-orange-500 hover:bg-indigo-700 text-white px-2 py-1 rounded">
                        Agregar Proveedor
                    </a>
                </div>

                        <!-- FIN - BOTÓN DE CREAR PROVEEDORES -->

                        <div
                            class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">

                            <!-- INICIO - TABLA DE PROVEEDORES -->

                            <table class="min-w-full border rounded overflow-hidden">
                                <thead class="bg-cyan-500 text-white">
                                    <tr>
                                        <th class="px-6 py-3 text-left font-semibold uppercase">Nombre de la Empresa</th>
                                        <th class="px-6 py-3 text-left font-semibold uppercase">Nombre del Contacto</th>
                                        <th class="px-6 py-3 text-left font-semibold uppercase">Dirección</th>
                                        <th class="px-6 py-3 text-left font-semibold uppercase">Teléfono</th>
                                        <th class="px-6 py-3 text-left font-semibold uppercase">Acción</th>
                                    </tr> 
                                </thead>

                                <tbody id="listado-proveedores" class="bg-slate-50 hover:bg-slate-100">
                                    @foreach ($Proveedores as $proveedor)
                                        <tr class="border-t hover:bg-gray-100" id="proveedor_{{ $proveedor->id }}">
                                            <td class="px-6 py-4">{{ $proveedor->name }}</td>
                                            <td class="px-6 py-4">{{ $proveedor->name_contacto }}</td>
                                            <td class="px-6 py-4">{{ $proveedor->direccion }}</td>
                                            <td class="px-6 py-4">{{ $proveedor->telefono }}</td>
                                            <td class="px-6 py-4">

                                                <!-- INICIO - BOTONES DE EDITAR Y ELIMINAR PROVEEDOR -->

                                                <div class="flex items-center gap-4">
                                                    <a href="{{ route('proveedores.edit', $proveedor->id) }}"
                                                        title="Editar el Cliente"
                                                        class="bg-green-500 hover:bg-green-600 text-white p-1 rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                        </svg>
                                                    </a>
                                                    <a href="#" title="Eliminar al Proveedor"
                                                        class="bg-red-500 hover:bg-red-600 text-white p-1 rounded"
                                                        onclick="deleteProveedor({{ $proveedor->id }})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </a>
                                                </div>

                                                <!-- FIN - BOTONES DE EDITAR Y ELIMINAR PROVEEDOR -->

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- FIN - TABLA DE PROVEEDORES -->


                        </div>
                        <div class="py-2">
                            {{ $Proveedores->links()}}
                        </div>
                    </div>
                </div>

                <!-- INICIO - PAGINACIÓN DE LA VISTA DE PROVEEDORES -->

                <!-- FIN - PAGINACIÓN DE LA VISTA DE PROVEEDORES -->

            </div>

            <!-- FIN - VISTA DE PROVEEDORES -->

        </div>
    </div>

</x-app-layout>

<script>
    // SCRIPT PARA ELIMINAR PROVEEDORES
    function deleteProveedor(id) {
        Swal.fire({
            title: '¿Seguro de borrar al proveedor?',
            text: 'No podrá revertir eso!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borrarlo!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {
                // Realizar una solicitud AJAX para eliminar el PROVEEDORES
                $.ajax({
                    url: '/proveedores/delete/' + id,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function() {
                        // Eliminar el elemento de la interfaz de PROVEEDORES
                        $('#proveedor_' + id).remove();

                        // Mostrar mensaje de éxito
                        Swal.fire(
                            'Borrado!',
                            'Proveedor borrado.',
                            'success'
                        );
                    },
                    error: function() {
                        // Mostrar mensaje de error si la solicitud falla
                        Swal.fire(
                            'Error!',
                            'Hubo un error al borrar al proveedor.',
                            'error'
                        );
                    }
                });
            }
        });
    }
</script>
