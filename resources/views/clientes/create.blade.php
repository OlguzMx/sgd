@section('titulo')
Crear nuevo cliente
@endsection
<x-app-layout>

    <!-- INICIO - HEADER -->

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SGD - Crear nuevo Cliente') }}
        </h2>
    </x-slot>

    <!-- FIN - HEADER -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- INICIO - DATOS DEL CLIENTE -->

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-8 py-2">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Datos del nuevo Cliente</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Ingrese la información requerida para el cliente.</p>
                    <form action="{{ route('clientes.create') }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <!-- INICIO - NOMBRE -->

                            <div class="sm:col-span-3">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
                                <div class="mt-2">
                                    <input type="text" name="name" id="name" value="{{old('name')}}" autocomplete="name" placeholder="Ej: José Martínez" class="@error('name') md:border border-red-500 @enderror block w-full rounded-md border-0 py-1.5 
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


                            <!-- INICIO - EMAIL -->
                            <div class="sm:col-span-3">
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                                <div class="mt-2">
                                    <input id="email" name="email" type="email" autocomplete="email" placeholder="Ej: correo@empresa.com" class="@error('name') md:border border-red-500 @enderror block w-full rounded-md border-0 py-1.5 
                                        text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 
                                        placeholder:text-gray-400 focus:ring-2 focus:ring-inset 
                                        focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('email')
                                    <div class="alerta my-2 p-2  border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                        <p class="text-red-700">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- FIN - EMAIL -->


                            <!-- INICIO - PUESTO -->
                            <div class="sm:col-span-3">
                                <label for="puesto" class="block text-sm font-medium leading-6 text-gray-900">Puesto</label>
                                <div class="mt-2">
                                    <input type="text" name="puesto" id="puesto" autocomplete="puesto" placeholder="Ej: Ingeniero de Soporte" class="@error('name') md:border border-red-500 @enderror block w-full rounded-md border-0 py-1.5 
                                        text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 
                                        placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 
                                        sm:text-sm sm:leading-6">
                                    @error('puesto')
                                    <div class="alerta my-2 p-2  border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                        <p class="text-red-700">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- FIN - PUESTO -->

                            <!-- INICIO - NÚMERO DE CELULAR -->

                            <div class="sm:col-span-3">
                                <label for="num_cel" class="block text-sm font-medium leading-6 text-gray-900">Número de Celular</label>
                                <div class="mt-2">
                                    <input type="text" name="num_cel" id="num_cel" autocomplete="num_cel" placeholder="Ej: 99 22 11 00 88" class="@error('name') md:border border-red-500 @enderror block w-full rounded-md border-0 
                                        py-1.5 text-gray-900 shadow-sm ring-1 ring-inset
                                      ring-gray-300 placeholder:text-gray-400 
                                        focus:ring-2 focus:ring-inset focus:ring-indigo-600 
                                        sm:text-sm sm:leading-6">
                                    @error('num_cel')
                                    <div class="alerta my-2 p-2  border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                        <p class="text-red-700">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- FIN - NÚMERO DE CELULAR -->

                            <!-- INICIO - NÚMERO FIJO -->

                            <div class="sm:col-span-3">
                                <label for="num_fijo" class="block text-sm font-medium leading-6 text-gray-900">Número Fijo (opcional)</label>
                                <div class="mt-2">
                                    <input type="text" name="num_fijo" id="num_fijo" autocomplete="num_fijo" placeholder="Ej: 1 23 45 67" class="block w-full rounded-md border-0 py-1.5 text-gray-900 
                                        shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 
                                        focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <!-- FIN - NÚMERO FIJO -->

                            <!-- INICIO - EXTENSION -->

                            <div class="sm:col-span-3">
                                <label for="extension" class="block text-sm font-medium leading-6 text-gray-900">Extension (opcional)</label>
                                <div class="mt-2">
                                    <input type="text" name="extension" id="extension" autocomplete="extension" placeholder="Introduce la extension max: 5 digitos" class="block w-full rounded-md border-0 py-1.5 
                                        text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 
                                        placeholder:text-gray-400 focus:ring-2 focus:ring-inset 
                                        focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <!-- FIN - EXTENSION -->

                            <!-- INICIO - DEPARTAMENTO -->

                            <div class="sm:col-span-3">
                                <label for="departamento" class="block text-sm font-medium leading-6 text-gray-900">Departamento (opcional) </label>
                                <div class="mt-2">
                                    <input type="text" name="departamento" id="departamento" autocomplete="departamento" placeholder="Introduce el departamento, ej: TI" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                                </div>
                            </div>

                            <!-- INICIO - DEPARTAMENTO -->


                            <!-- INICIO - EMPRESA -->

                            <div class="sm:col-span-3">
                                <label for="empresas_id" class="block text-sm font-medium leading-6 text-gray-900">Empresa</label>
                                <div class="mt-2 inline-block">
                                    <select id="empresas_id" name="empresas_id" class="@error('name') md:border border-red-500 @enderror w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                        <option value="">Seleccione su Empresa</option>
                                        @foreach ($Empresa as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('empresas_id')
                                    <div class="alerta my-2 p-2  border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                        <p class="text-red-700">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- FIN - EMPRESA -->

                        </div>

                        <!-- INICIO - BOTONES DE CREAR CLIENTE Y REGRESAR -->

                        <div class="py-4">
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-2 rounded transition duration-300 ease-in-out transform hover:scale-105"><a href="{{ route('clientes.index') }}">Regresar</a></button>
                            <button type="submit" class="bg-orange-500 hover:bg-indigo-700 text-white font-bold p-2 rounded transition duration-300 ease-in-out transform hover:scale-105">Crear Cliente</button>
                        </div>

                        <!-- FIN - BOTONES DE CREAR CLIENTE Y REGRESAR -->

                    </form>
                </div>
            </div>

            <!-- FIN - DATOS DEL CLIENTE -->

        </div>
    </div>
</x-app-layout>