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
                                class="bg-blue-500 px-6 py-4 transition-colors duration-300 ease-in-out hover:bg-blue-600 flex flex-shrink justify-between">
                                <a href="{{ route('documentos.show', $documento->id) }}"
                                    class="text-white font-semibold text-sm hover:text-blue-200 transition duration-300 ease-in-out">Ver
                                    más
                                </a>
                                <div class="flex justify-center items-center gap-2">
                                    <button onclick="confirmDelete({{ $documento->id }})" type="button"
                                        class="bg-white p-1 rounded-full text-red-500 hover:text-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>

                                    </button>
                                    <a href="{{route('documentos.edit', $documento->id)}}" class="bg-white text-blue-600 hover:text-blue-800 p-1 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                </div>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminarlo'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, envía una solicitud DELETE al servidor
                fetch('/documentos/delete/' + id, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }).then(response => {
                    // Redirige a la página después de la eliminación
                    window.location.href = '/documentos';
                }).catch(error => {
                    console.error('Error al eliminar el documento:', error)
                })
            }
        });
    }
</script>
