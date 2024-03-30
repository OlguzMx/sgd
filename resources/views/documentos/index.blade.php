@section('titulo')
    Documentos
@endsection
<x-app-layout>

    <!-- INICIO - HEADER -->

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SGD - Clientes') }}
        </h2>
    </x-slot>

    <!-- FIN - HEADER -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- INICIO - VISTA DE DOCUMENTOS -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-8 py-2">

                {{-- Importar alerta --}}
                <livewire:alerta />

                <!-- INICIO - CONTEO DE DOCUMENTOS -->

                <h2 class="text-3xl font-light text-center font-mono">{{ $DocumentoCount }}
                    <span class="font-normal"> @choice('Documento|Documentos', $DocumentoCount)</span>
                </h2>

                <!-- FIN - CONTEO DE DOCUMENTOS -->

                <div class="flex items-center gap-4 mb-3">
                    <a href="{{ route('documentos.create') }}"
                        class="uppercase text-sm font-semibold bg-orange-500 hover:bg-indigo-700 text-white px-2 py-1 rounded">
                        Agregar documento
                    </a>
                </div>

                {{-- CARDS DOCUMENTOS --}}

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 place-items-center">
                    @forelse ($documentos as $documento)
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden w-full">
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">Tipo: <span
                                        class="text-gray-600 font-normal">{{ $documento->tipo_documento->name }}</span>
                                </h3>
                                <p class="text-base font-semibold text-gray-700 mb-2">Usuario: <span
                                        class="text-gray-600 font-normal">{{ $documento->user->name }}</span></p>
                                <p class="text-base font-semibold text-gray-700 mb-2">Cliente: <span
                                        class="text-gray-600 font-normal">{{ $documento->cliente->name }}</span></p>
                                <p class="text-sm text-gray-500">Creado {{ $documento->created_at->diffForHumans() }}
                                </p>
                            </div>
                            <div
                                class="bg-blue-500 px-6 py-4 transition-colors duration-300 ease-in-out hover:bg-blue-600">
                                <a href="{{ route('documentos.show', $documento) }}"
                                    class="text-white font-semibold text-sm hover:text-blue-200 transition duration-300 ease-in-out">Ver
                                    más</a>
                            </div>
                        </div>
                    @empty
                        <p class="col-span-4 text-gray-500">No hay ningún documento creado, agrega alguno...</p>
                    @endforelse


                    <!-- Repite este bloque para más elementos en el grid -->
                </div>


            </div>
        </div>
    </div>

    <!-- FIN - VISTA DE DOCUMENTOS -->

    </div>
    </div>

</x-app-layout>

<script>
    // SCRIPT PARA ELIMINAR DOCUMENTOS
    function deleteDocumento(id) {
        Swal.fire({
            title: '¿Seguro de borrar el documento?',
            text: 'No podrá revertir eso!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borrarlo!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {
                // Realizar una solicitud AJAX para eliminar el usuario
                $.ajax({
                    url: '/documentos/delete/' + id,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function() {
                        // Eliminar el elemento de la interfaz de usuario
                        $('#documento_' + id).remove();

                        // Mostrar mensaje de éxito
                        Swal.fire(
                            'Borrado!',
                            'Documento borrado.',
                            'success'
                        );
                    },
                    error: function() {
                        // Mostrar mensaje de error si la solicitud falla
                        Swal.fire(
                            'Error!',
                            'Hubo un error al borrar el documento.',
                            'error'
                        );
                    }
                });
            }
        });
    }
</script>
