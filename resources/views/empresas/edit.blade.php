@section('titulo')
Editar cliente
@endsection
<x-app-layout>

    <!-- INICIO - HEADER -->

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SGD - Editar Empresa') }}
        </h2>
    </x-slot>

    <!-- FIN - HEADER -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- INICIO - DATOS PARA EDITAR EMPRESA -->

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-8 py-2">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Datos de la Empresa</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Ingrese la información requerida para editar a la empresa.</p>
                    <form action="{{ route('empresas.update', $Empresa->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <!-- INICIO - EDITAR NOMBRE -->

                            <div class="sm:col-span-3">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
                                <div class="mt-2">
                                    <input type="text" name="name" id="name" value="{{ $Empresa->name }}" autocomplete="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <!-- FIN - EDITAR NOMBRE -->

                            <!-- INICIO - EDITAR EMPRESA -->

                         

                            <!-- FIN - EDITAR EMPRESA -->

                            <!-- INICIO EDITAR DIRECCIÓN -->

                            <div class="sm:col-span-3">
                                <label for="direccion" class="block text-sm font-medium leading-6 text-gray-900">Dirección</label>
                                <div class="mt-2">
                                    <input id="direccion" name="direccion" type="text" value="{{ $Empresa->direccion }}" autocomplete="direccion" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <!-- FIN EDITAR DIRECCIÓN -->

                            <div class="sm:col-span-3">
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                                <div class="mt-2">
                                    <input id="email" name="email" type="email" value="{{ $Empresa->email }}" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="ubicacion"
                                    class="block text-sm font-medium leading-6 text-gray-900">Ubicación</label>
                                <div class="mt-2">
                                    <input 
                                        id="ubicacion" 
                                        name="ubicacion" 
                                        type="text" 
                                        autocomplete="ubicacion"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 
                                        shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 
                                        focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        value="{{ $Empresa->ubicacion }}">
                                </div>
                            </div>
                            
                            <div class="sm:col-span-3">
                                <label for="codigo_postal"
                                    class="block text-sm font-medium leading-6 text-gray-900">Código Postal</label>
                                <div class="mt-2">
                                    <input 
                                        id="codigo_postal" 
                                        name="codigo_postal" 
                                        type="text" 
                                        autocomplete="codigo_postal"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 
                                        shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 
                                        focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        value="{{ $Empresa->codigo_postal }}">
                                </div>
                            </div>
                            
                        </div>

                        <!-- INICIO - BOTON DE GUARDAR EDICION Y REGRESAR -->

                        <div class="py-4">
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-2 rounded transition duration-300 ease-in-out transform hover:scale-105"><a href="{{ route('empresas.index') }}">Regresar</a></button>
                            <button type="submit" class="bg-orange-500 hover:bg-indigo-700 text-white font-bold p-2 rounded transition duration-300 ease-in-out transform hover:scale-105">Guardar edición</button>
                        </div>

                        <!-- FIN - BOTON DE GUARDAR EDICION Y REGRESAR -->

                    </form>
                </div>
            </div>

            <!-- FIN - DATOS PARA EDITAR EMPRESA -->

        </div>
    </div>
</x-app-layout>