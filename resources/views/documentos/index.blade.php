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
