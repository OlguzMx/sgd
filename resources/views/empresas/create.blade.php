@section('titulo')
Crear empresa
@endsection
<x-app-layout>

    <!-- INICIO - HEADER -->

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SGD - Crear Empresa') }}
        </h2>
    </x-slot>

    <!-- FIN - HEADER -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- INICIO - DATOS PARA CREAR EMPRESA -->

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-8 py-2">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Datos de la Empresa</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Ingrese la información requerida para crear a la
                        empresa.</p>
                    <form action="{{ route('empresas.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <!-- INICIO - NOMBRE -->

                            <div class="sm:col-span-3">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
                                <div class="mt-2">
                                    <input id="name" name="name" value="{{ old('name') }}" type="text" autocomplete="name" placeholder="Ej: AR-SITE INTEGRADORES S.A. DE C.V." class="@error('name') md:border border-red-500 @enderror block w-full rounded-md border-0 py-1.5 
                                         text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 
                                         placeholder:text-gray-400 focus:ring-2 focus:ring-inset 
                                         focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('name')
                                    <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                        <p class="text-red-700">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- FIN - NOMBRE -->

                            <!-- INICIO - EMAIL -->

                            <div class="sm:col-span-3">
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                                <div class="mt-2">
                                    <input id="email" name="email" value="{{ old('email') }}" type="email" autocomplete="email" placeholder="Ej: correo@gmail.com" class="@error('email') md:border border-red-500 @enderror block w-full rounded-md border-0 py-1.5 
                                         text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 
                                         placeholder:text-gray-400 focus:ring-2 focus:ring-inset 
                                         focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('email')
                                    <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                        <p class="text-red-700">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- FIN - EMAIL -->

                            <!-- INICIO - DIRECCIÓN -->

                            <div class="sm:col-span-3">
                                <label for="direccion" class="block text-sm font-medium leading-6 text-gray-900">Dirección</label>
                                <div class="mt-2">
                                    <input id="direccion" name="direccion" value="{{ old('direccion') }}" type="text" autocomplete="direccion" placeholder="Ej: Av. Gregorio Mendez Col. Atasta" class="@error('direccion') md:border border-red-500 @enderror block w-full rounded-md border-0 py-1.5 
                                         text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 
                                         placeholder:text-gray-400 focus:ring-2 focus:ring-inset 
                                         focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('direccion')
                                    <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                        <p class="text-red-700">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- FIN - DIRECCIÓN -->

                            <!-- INICIO - UBICACIÓN -->

                            <div class="sm:col-span-3">
                                <label for="ubicacion" class="block text-sm font-medium leading-6 text-gray-900">Ubicación</label>
                                <div class="mt-2">
                                    <input id="ubicacion" name="ubicacion" value="{{ old('ubicacion') }}" type="text" autocomplete="ubicacion" placeholder="Ej: Villahermosa, Tabasco" class="@error('ubicacion') md:border border-red-500 @enderror block w-full rounded-md border-0 py-1.5 
                                         text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 
                                         placeholder:text-gray-400 focus:ring-2 focus:ring-inset 
                                         focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('ubicacion')
                                    <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                        <p class="text-red-700">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- FIN - UBICACIÓN -->

                            <!-- INICIO - CÓDIGO POSTAL -->

                            <div class="sm:col-span-3">
                                <label for="codigo_postal" class="block text-sm font-medium leading-6 text-gray-900">Código Postal</label>
                                <div class="mt-2">
                                    <input id="codigo_postal" name="codigo_postal" value="{{ old('codigo_postal') }}" type="text" autocomplete="codigo_postal" placeholder="Ej: 86150" class="@error('codigo_postal') md:border border-red-500 @enderror block w-full rounded-md border-0 py-1.5 
                                         text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 
                                         placeholder:text-gray-400 focus:ring-2 focus:ring-inset 
                                         focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('codigo_postal')
                                    <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                        <p class="text-red-700">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- FIN - CÓDIGO POSTAL -->

                        </div>

                        <!-- INICIO - BOTON DE CREAR EMPRESA Y REGRESAR -->

                        <div class="py-4">
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-2 rounded transition duration-300 ease-in-out transform hover:scale-105"><a href="{{ route('empresas.index') }}">Regresar</a></button>
                            <button type="submit" class="bg-orange-500 hover:bg-indigo-700 text-white font-bold p-2 rounded transition duration-300 ease-in-out transform hover:scale-105">Crear
                                Empresa</button>
                        </div>

                        <!-- FIN - BOTON DE CREAR EMPRESA Y REGRESAR -->

                    </form>
                </div>
            </div>

            <!-- FIN - DATOS PARA CREAR EMPRESA -->

        </div>
    </div>
</x-app-layout>