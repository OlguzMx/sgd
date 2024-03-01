@section('titulo')
Editar documento
@endsection
<x-app-layout>
    <!-- INICIO - HEADER -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SGD - Editar Documento') }}
        </h2>
    </x-slot>

    <!-- FIN - HEADER -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- INICIO - DATOS DEL DOCUMENTOS -->

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-8 py-2">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Datos del Documento</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Ingrese la información requerida para editar el documento.</p>
                    <form action="{{ route('documentos.update', $Documento->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <!-- INICIO - EDITAR TÍTULO -->

                            <div class="sm:col-span-3">
                                <label for="titulo" class="block text-sm font-medium leading-6 text-gray-900">Título</label>
                                <div class="mt-2">
                                    <input type="text" name="titulo" id="titulo" value="{{ $Documento->titulo }}" autocomplete="titulo" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                        <!-- FIN - EDITAR TÍTULO -->

                        <!-- INICIO - EDITAR TIPO DE DOCUMENTO -->

                            <div class="sm:col-span-3">
                                <label for="tipos_documentos_id" class="block text-sm font-medium leading-6 text-gray-900">Tipo de Documento</label>
                                <div class="mt-2">
                                    <select id="tipos_documentos_id" name="tipos_documentos_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                        <option value="">Seleccione el tipo de documento</option>
                                        @foreach ($TipoDocumento as $tipoDoc)
                                        <option value="{{ $tipoDoc->id }}" {{$tipoDoc->id==$Documento->tipos_documentos_id?'selected':''}}>{{ $tipoDoc->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        <!-- FIN - EDITAR TIPO DE DOCUMENTO -->


                        <!-- INICIO - EDITAR USUARIO -->

                            <div class="sm:col-span-3">
                                <label for="users_id" class="block text-sm font-medium leading-6 text-gray-900">Usuario</label>
                                <div class="mt-2">
                                    <select id="users_id" name="users_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                        <option value="">Seleccione su Usuario</option>
                                        @foreach ($User as $user)
                                        <option value="{{ $user->id }}" {{$user->id==$Documento->users_id?'selected':''}}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        <!-- FIN - EDITAR USUARIO -->

                        <!-- INICIO - EDITAR CLIENTE -->

                            <div class="sm:col-span-3">
                                <label for="clientes_id" class="block text-sm font-medium leading-6 text-gray-900">Cliente</label>
                                <div class="mt-2">
                                    <select id="clientes_id" name="clientes_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                        <option value="">Seleccione el Cliente</option>
                                        @foreach ($Cliente as $cliente)
                                        <option value="{{ $cliente->id }}" {{$cliente->id==$Documento->clientes_id?'selected':''}}>{{ $cliente->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        <!-- FIN - EDITAR CLIENTE -->

                        </div>

                        <!-- INICIO - BOTÓN DE GUARDAR EDICIÓN Y REGRESAR -->
                        <div class="py-4">
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-2 rounded transition duration-300 ease-in-out transform hover:scale-105"><a href="{{ route('documentos.index') }}">Regresar</a></button>
                            <button type="submit" class="bg-orange-500 hover:bg-indigo-700 text-white font-bold p-2 rounded transition duration-300 ease-in-out transform hover:scale-105">Guardar edición</button>
                        </div>

                        <!-- FIN - BOTÓN DE GUARDAR EDICIÓN Y REGRESAR -->

                    </form>
                </div>
            </div>

        <!-- INICIO - DATOS DEL DOCUMENTOS -->

        </div>
    </div>
</x-app-layout>