@section('titulo')
Crear Documento
@endsection
<x-app-layout>

    <!-- INICIO - HEADER  -->

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SGD - Crear nuevo Documento') }}
        </h2>
    </x-slot>

    <!-- FIN - HEADER  -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- INICIO - DATOS DEL DOCUMENTO -->

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-8 py-2 flex flex-col items-center md:block ">
                <div class="border-b border-gray-900/10 pb-12">

                    <h2 class="text-base font-semibold leading-7 text-gray-900">Datos del Documento</h2>
                    <p class="my-2 text-sm leading-6 text-gray-600">Ingrese la información requerida para crear el documento.</p>
                    <livewire:crear-documento />
                    
                </div>
            </div>

            <!-- FIN - DATOS DEL DOCUMENTO -->

        </div>
    </div>
</x-app-layout>