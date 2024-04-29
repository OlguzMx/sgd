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
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Datos del Documento: <span class="uppercase">{{ $Documentos->tipo_documento->name }}</span></h2>
                    <div class="mt-8 grid grid-cols-1 gap-x-2 gap-y-2 md:grid-cols-3">

                        <!-- INICIO - VISTA PREVIA DE ENTRADA DE MAT/EQ A BODEGA -->

                        <div class="sm:col-span-3 border px-3 py-2">
                            <div class="mt-2 mx-24">
                                <img src="{{ asset('img/logo-arsite.png') }}" alt="Logo" width="500px" class="my-7">
                                {{-- Muestra la fecha del documento en el siguiente formato:  XX (dia) de XX (mes) 20XX --}}
                                <p class="text-right">Villahermosa, Tabasco a {{ \Carbon\Carbon::parse($Documentos->entrada_almacen->fecha)->translatedFormat('d \d\e F \d\e Y') }}</p>
                                <p class="font-semibold">{{ $Documentos->entrada_almacen->name_cliente }}</p>
                                <p class="font-semibold">{{ $Documentos->entrada_almacen->empresa_cliente }}</p>
                                <p class="font-semibold">{{ $Documentos->entrada_almacen->puesto_cliente }}</p>
                                <h2 class="font-bold uppercase text-3xl text-center my-10">{{ $Documentos->tipo_documento->name }}</h2>
                                <table class="min-w-full table-auto border-collapse border border-slate-500 my-2">
                                    <thead class="text-center text-lg uppercase font-thin border border-slate-600 bg-gray-400">
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2">Cantidad</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">Marca</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">Modelo</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">Num. de parte</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">Descripción</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Documentos->entrada_almacen->detalles_entrada_almacen as $detalle)
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2 text-center">{{ $detalle->cantidad }}</td>
                                            <td class="border-collapse border border-slate- px-4 py-2 text-center">{{ $detalle->marca }}</td>
                                            <td class="border-collapse border border-slate- px-4 py-2 text-center">{{ $detalle->modelo }}</td>
                                            <td class="border-collapse border border-slate- px-4 py-2 text-center">{{ $detalle->num_de_parte }}</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">{{ $detalle->descripcion }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <img src="{{ asset('img/remision/firmas_remision.jpg') }}" alt="Logo" class="mx-auto object-cover rounded my-28">
                            </div>
                            <footer>
                                <p class="text-center text-sm font-bold text-gray-700">
                                    Calle Unión No. 161 Col Escandón 1ra Sección dpto. 22, C.P. 11800
                                    <br>
                                    Delegación Miguel Hidalgo, Ciudad de Mexico RFC AIN040211G2A
                                    <br>
                                    TEL: (993) 3-55-40-05 FAX (993) 1-85-07-54 ventas@arsite.com.mx www.arsite.com.mx</p>
                            </footer>
                        </div>

                        <!-- FIN - VISTA PREVIA DE ENTRADA DE MAT/EQ A BODEGA -->

                    </div>

                    <!-- INICIO - REGRESAR -->
                    <div class="py-4">
                        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-2 rounded transition duration-300 ease-in-out transform hover:scale-105"><a href="{{ route('documentos.index') }}">Regresar</a></button>
                    </div>

                    <!-- FIN - REGRESAR -->

                </div>

            </div>
        </div>

    </div>
</x-app-layout>