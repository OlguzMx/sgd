@section('titulo')
Crear nuevo usuario
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SGD - Crear nuevo Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- INICIO - VISTA DE CREAR USUARIO -->

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-8 py-2">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Datos del nuevo Usuario</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Ingrese la información requerida para el usuario.</p>
                    <form action="{{ route('usuarios.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <!-- INICIO - NOMBRE -->

                            <div class="sm:col-span-3">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
                                <div class="mt-2">
                                    <input id="name" name="name" value="{{ old('name') }}" type="text" autocomplete="name" placeholder="Ej: Carlos Pérez" class="@error('name') md:border border-red-500 @enderror block w-full rounded-md border-0 py-1.5 
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
                                    <input id="email" name="email" value="{{ old('email') }}" type="text" placeholder="Ej: cperez@correo.com" class="@error('email') md:border border-red-500 @enderror block w-full rounded-md border-0 py-1.5 
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

                            <!-- INICIO - CONTRASEÑA -->

                            <div class="sm:col-span-3">
                                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Contraseña</label>
                                <div class="mt-2">
                                    <input id="password" name="password" type="text" class="@error('password') md:border border-red-500 @enderror block w-full rounded-md border-0 py-1.5 
                                         text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 
                                         placeholder:text-gray-400 focus:ring-2 focus:ring-inset 
                                         focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('password')
                                    <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                        <p class="text-red-700">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- FIN - CONTRASEÑA -->

                            <!-- INICIO - REPETIR CONTRASEÑA -->

                            <div class="sm:col-span-3">
                                <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Repetir Contraseña</label>
                                <div class="mt-2">
                                    <input id="password_confirmation" name="password_confirmation" type="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <!-- FIN - REPETIR CONTRASEÑA -->

                            <!-- INICIO - ROL -->

                            <div class="sm:col-span-3">
                                <label for="rol" class="block text-sm font-medium leading-6 text-gray-900">Rol</label>
                                <div class="mt-2">
                                    <select id="rol" name="rol" class="@error('rol') md:border border-red-500 @enderror block w-full rounded-md border-0 py-1.5 
                                         text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 
                                         placeholder:text-gray-400 focus:ring-2 focus:ring-inset 
                                         focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option value="">Seleccione un Rol</option>
                                        <option value="1">Administrador</option>
                                        <option value="2">Operador</option>
                                    </select>
                                    @error('rol')
                                    <div class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                                        <p class="text-red-700">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- FIN - ROL -->

                        </div>

                        <!-- INICIO - BOTÓN DE CREAR USUARIO Y REGRESAR -->

                        <div class="py-4">
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-2 rounded transition duration-300 ease-in-out transform hover:scale-105"><a href="{{ route('usuarios.index') }}">Regresar</a></button>
                            <button type="submit" class="bg-orange-500 hover:bg-indigo-700 text-white font-bold p-2 rounded transition duration-300 ease-in-out transform hover:scale-105">Crear Usuario</button>
                        </div>

                        <!-- FIN - BOTÓN DE CREAR USUARIO Y REGRESAR -->

                    </form>
                </div>
            </div>

            <!-- FIN - VISTA DE CREAR USUARIO -->

        </div>
    </div>
</x-app-layout>