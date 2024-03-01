@section('titulo')
Editar cliente
@endsection
<x-app-layout>

    <!-- INICIO - HEADER -->

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SGD - Editar Cliente') }}
        </h2>
    </x-slot>

    <!-- FIN - HEADER -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- INICIO - EDITAR DATOS DEL CLIENTE -->

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-8 py-2">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Datos del Cliente</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Ingrese la información requerida para editar al cliente.</p>
                    <form action="{{ route('clientes.update', $Clientes->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <!-- INICIO - EDITAR NOMBRE -->

                            <div class="sm:col-span-3">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
                                <div class="mt-2">
                                    <input type="text" name="name" id="name" value="{{ $Clientes->name }}" autocomplete="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <!-- FIN - EDITAR NOMBRE -->

                            <!-- INICIO - EDITAR EMAIL -->

                            <div class="sm:col-span-3">
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                                <div class="mt-2">
                                    <input id="email" name="email" type="email" value="{{ $Clientes->email }}" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <!-- FIN - EDITAR EMAIL -->

                            <!-- INICIO - EDITAR PUESTO -->

                            <div class="sm:col-span-3">
                                <label for="puesto" class="block text-sm font-medium leading-6 text-gray-900">Puesto</label>
                                <div class="mt-2">
                                    <input id="puesto" name="puesto" type="text" value="{{ $Clientes->puesto }}" autocomplete="puesto" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <!-- FIN - EDITAR PUESTO -->

                            <!-- INICIO - EDITAR NÚMERO DE CELULAR -->

                            <div class="sm:col-span-3">
                                <label for="num_cel" class="block text-sm font-medium leading-6 text-gray-900">Número de Celular</label>
                                <div class="mt-2">
                                    <input id="num_cel" name="num_cel" type="text" value="{{ $Clientes->num_cel }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <!-- FIN - EDITAR NÚMERO DE CELULAR -->

                            <!-- INICIO - EDITAR NÚMERO FIJO -->

                            <div class="sm:col-span-3">
                                <label for="num_fijo" class="block text-sm font-medium leading-6 text-gray-900">Número Fijo</label>
                                <div class="mt-2">
                                    <input id="num_fijo" name="num_fijo" type="text" value="{{ $Clientes->num_fijo }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <!-- FIN - EDITAR NÚMERO FIJO -->

                            <!-- INICIO - EDITAR EXTENSION -->

                            <div class="sm:col-span-3">
                                <label for="extension" class="block text-sm font-medium leading-6 text-gray-900">Extensión</label>
                                <div class="mt-2">
                                    <input id="extension" name="extension" type="text" value="{{ $Clientes->extension }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <!-- FIN - EDITAR EXTENSION -->

                            <!-- INICIO - EDITAR EMPRESA -->

                            <div class="sm:col-span-3">
                                <label for="empresas_id" class="block text-sm font-medium leading-6 text-gray-900">Empresa</label>
                                <div class="mt-2">
                                    <select id="empresas_id" name="empresas_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                        <option value="">Seleccione una Empresa</option>
                                        @foreach ($Empresa as $row)
                                        <option value="{{ $row->id }}" {{$row->id==$Clientes->empresas_id?'selected':''}}>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- FIN - EDITAR EMPRESA -->

                        </div>

                        <!-- INICIO - BOTONES DE GUARDAR EDICIÓN Y REGRESAR -->

                        <div class="py-4">
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-2 rounded transition duration-300 ease-in-out transform hover:scale-105"><a href="{{ route('clientes.index') }}">Regresar</a></button>
                            <button type="submit" class="bg-orange-500 hover:bg-indigo-700 text-white font-bold p-2 rounded transition duration-300 ease-in-out transform hover:scale-105">Editar Usuario</button>
                        </div>

                        <!-- FIN - BOTONES DE GUARDAR EDICIÓN Y REGRESAR -->

                    </form>
                </div>
            </div>

            <!-- FIN - EDITAR DATOS DEL CLIENTE -->

        </div>
    </div>
</x-app-layout>