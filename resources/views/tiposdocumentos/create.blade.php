@section('titulo')
Crear nuevo tipo de documento
@endsection
<x-app-layout>

    <!-- INICIO - HEADER -->

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SGD - Crear nuevo Tipo de Documento') }}
        </h2>

    </x-slot>

    <!-- FIN - HEADER -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- INICIO - VISTA DE CREAT TIPOS DE DOCUMENTOS -->

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-8 py-2">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Datos del nuevo Tipo de Documento</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Ingrese la información requerida para el tipo de documento.</p>
                    <form action="{{ route('tiposdocumentos.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <!-- INICIO - NOMBRE -->

                            <div class="sm:col-span-3">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
                                <div class="mt-2">
                                    <input type="text" name="name" id="name" autocomplete="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <!-- FIN - NOMBRE -->

                        </div>

                        <!-- INICIO - BOTON DE CREAR TIPO DE DOCUMENTO Y REGRESAR -->

                        <div class="py-4">
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-2 rounded transition duration-300 ease-in-out transform hover:scale-105"><a href="{{ route('tiposdocumentos.index') }}">Regresar</a></button>
                            <button type="submit" class="bg-orange-500 hover:bg-indigo-700 text-white font-bold p-2 rounded transition duration-300 ease-in-out transform hover:scale-105">Crear Tipo de Documento</button>
                        </div>

                        <!-- FIN - BOTON DE CREAR TIPO DE DOCUMENTO Y REGRESAR -->

                    </form>
                </div>
            </div>

            <!-- FIN - VISTA DE CREAT TIPOS DE DOCUMENTOS -->

        </div>
    </div>
</x-app-layout>