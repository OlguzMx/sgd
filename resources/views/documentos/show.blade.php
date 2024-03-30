@section('titulo')
Ver Documentos
@endsection
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SGD - Ver Documento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-8 py-2">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Datos del Documento</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Ingrese la información requerida para editar el documento.</p>
                    <div class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <!-- INICIO - EDITAR USUARIO -->

                        <div class="sm:col-span-3">
                            <label for="users_id" class="block text-sm font-medium leading-6 text-gray-900">Usuario</label>
                            <div class="mt-2">
                                <p>{{ $Documentos->user->name }}</p>
                            </div>
                        </div>

                        <!-- FIN - EDITAR USUARIO -->

                    </div>

                    <!-- INICIO - BOTÓN DE GUARDAR EDICIÓN Y REGRESAR -->
                    <div class="py-4">
                        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-2 rounded transition duration-300 ease-in-out transform hover:scale-105"><a href="{{ route('documentos.index') }}">Regresar</a></button>
                        <button type="submit" class="bg-orange-500 hover:bg-indigo-700 text-white font-bold p-2 rounded transition duration-300 ease-in-out transform hover:scale-105">Guardar edición</button>
                    </div>

                    <!-- FIN - BOTÓN DE GUARDAR EDICIÓN Y REGRESAR -->

                </div>
            </div>
        </div>
    </div>
</x-app-layout>