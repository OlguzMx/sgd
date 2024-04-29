@section('titulo')
Crear Proveedor
@endsection
<x-app-layout>

    <!-- INICIO - HEADER  -->

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SGD - Crear nuevo Proveedor') }}
        </h2>
    </x-slot>

    <!-- FIN - HEADER  -->

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <!-- INICIO - DATOS DEL PROVEEDOR -->

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-8 py-2 flex flex-col items-center md:block ">
                <div class="border-b border-gray-900/10 pb-12">

                    <h2 class="text-base font-semibold leading-7 text-gray-900">Datos del Proveedor</h2>
                    <p class="my-2 text-sm leading-6 text-gray-600">Ingrese la información requerida para crear el proveedor.</p>
                    <form action="{{ route('proveedores.create') }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <!-- INICIO - NOMBRE -->

                            <div class="sm:col-span-3">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nombre de la Empresa</label>
                                <div class="mt-2">
                                    <input type="text" name="name" id="name" value="{{old('name')}}" autocomplete="name" placeholder="Ej: Westcon Mexico, S.A. de C.V" class="@error('name') md:border border-red-500 @enderror block w-full rounded-md border-0 py-1.5 
                                        text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 
                                        placeholder:text-gray-400 focus:ring-2 focus:ring-inset 
                                        focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('name')
                                    <div class="alerta my-2 p-2  border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                        <p class="text-red-700">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- FIN - NOMBRE -->


                            <!-- INICIO - NOMBRE DEL CONTACTO -->
                            <div class="sm:col-span-3">
                                <label for="name_contacto" class="block text-sm font-medium leading-6 text-gray-900">Nombre del Contacto</label>
                                <div class="mt-2">
                                    <input id="name_contacto" name="name_contacto" type="text" autocomplete="name_contacto" placeholder="Ej: Julio Rodriguez" class="@error('name_contacto') md:border border-red-500 @enderror block w-full rounded-md border-0 py-1.5 
                                        text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 
                                        placeholder:text-gray-400 focus:ring-2 focus:ring-inset 
                                        focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('name_contacto')
                                    <div class="alerta my-2 p-2  border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                        <p class="text-red-700">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- FIN - NOMBRE DEL CONTACTO -->


                            <!-- INICIO - DIRECCIÓN -->
                            <div class="sm:col-span-3">
                                <label for="direccion" class="block text-sm font-medium leading-6 text-gray-900">Dirección</label>
                                <div class="mt-2">
                                    <input type="text" name="direccion" id="direccion" autocomplete="direccion" placeholder="Ej: Av. Insurgentes Sur 730 Piso 11 Col. Del Valle, Del. Benito Juárez, C.P. 03100 Ciudad de México" class="@error('direccion') md:border border-red-500 @enderror block w-full rounded-md border-0 py-1.5 
                                        text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 
                                        placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 
                                        sm:text-sm sm:leading-6">
                                    @error('direccion')
                                    <div class="alerta my-2 p-2  border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                        <p class="text-red-700">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- FIN - DIRECCIÓN -->

                            <!-- INICIO - NÚMERO DE TELÉFONO -->

                            <div class="sm:col-span-3">
                                <label for="telefono" class="block text-sm font-medium leading-6 text-gray-900">Número de Teléfono</label>
                                <div class="mt-2">
                                    <input type="text" name="telefono" id="telefono" autocomplete="telefono" placeholder="Ej: 9922110088" class="@error('telefono') md:border border-red-500 @enderror block w-full rounded-md border-0 
                                        py-1.5 text-gray-900 shadow-sm ring-1 ring-inset
                                      ring-gray-300 placeholder:text-gray-400 
                                        focus:ring-2 focus:ring-inset focus:ring-indigo-600 
                                        sm:text-sm sm:leading-6">
                                    @error('telefono')
                                    <div class="alerta my-2 p-2  border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                        <p class="text-red-700">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- FIN - NÚMERO DE TELÉFONO -->

                        </div>

                        <!-- INICIO - BOTONES DE CREAR CLIENTE Y REGRESAR -->

                        <div class="py-4">
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-2 rounded transition duration-300 ease-in-out transform hover:scale-105"><a href="{{ route('proveedores.index') }}">Regresar</a></button>
                            <button type="submit" class="bg-orange-500 hover:bg-indigo-700 text-white font-bold p-2 rounded transition duration-300 ease-in-out transform hover:scale-105">Crear Proveedor</button>
                        </div>

                        <!-- FIN - BOTONES DE CREAR CLIENTE Y REGRESAR -->

                    </form>

                </div>
            </div>

            <!-- FIN - DATOS DEL PROVEEDOR -->

        </div>
    </div>
</x-app-layout>