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

                        <!-- INICIO - VISTA PREVIA REMISIÓN -->

                        <div class="sm:col-span-3 border px-3 py-2">
                            <div class="mt-2">
                                <img src="{{ asset('img/logo-arsite.png') }}" alt="Logo" width="500px" class="my-7">
                                {{-- Muestra la fecha del documento en el siguiente formato:  XX (dia) de XX (mes) 20XX --}}
                                <p class="text-right">CDMX a {{ \Carbon\Carbon::parse($Documentos->garantia_cambio->fecha)->translatedFormat('d \d\e F \d\e Y') }}</p>
                                <p class="font-bold">{{ $Documentos->garantia_cambio->empresa->name }}</p>
                                <p class="font-semibold">{{ $Documentos->cliente->name }}</p>
                                <p class="font-semibold">{{ $Documentos->cliente->puesto }}</p>
                                <p class="font-semibold">{{ $Documentos->garantia_cambio->empresa->ubicacion }}</p>
                                <p class="">
                                    Por medio de la presente yo el <span class="font-bold">C. {{ $Documentos->user->name }}</span>, en mi carácter de representante legal,
                                    me dirijo de a usted para informarle que, debido a la aplicación de garantía solicitada con el fabricante,
                                    <span>{{ $Documentos->garantia_cambio->descripcion }}</span>
                                </p>
                                <h2 class="font-bold uppercase text-3xl text-center my-4">{{ $Documentos->tipo_documento->name }}</h2>
                                <h3>Equipo Dañado</h3>
                                <table class="min-w-full table-auto border-collapse border border-slate-500 my-2">
                                    <thead class="text-center text-lg uppercase font-thin border border-slate-600 bg-gray-400">
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2">Marca</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">Modelo</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">No. de serie</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Documentos->garantia_cambio->detalles_garantia_cambio as $detalle)
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2 text-center">{{ $detalle->marca_danado }}</td>
                                            <td class="border-collapse border border-slate- px-4 py-2 text-center">{{ $detalle->modelo_danado }}</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">{{ $detalle->num_serie_danado }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <h3>Equipo Reemplazo</h3>
                                <table class="min-w-full table-auto border-collapse border border-slate-500 my-2">
                                    <thead class="text-center text-lg uppercase font-thin border border-slate-600 bg-gray-400">
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2">Marca</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">Modelo</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">No. de serie</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">No. de Inventario</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Documentos->garantia_cambio->detalles_garantia_cambio as $detalle)
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2 text-center">{{ $detalle->marca_reemplazo }}</td>
                                            <td class="border-collapse border border-slate- px-4 py-2 text-center">{{ $detalle->modelo_reemplazo }}</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">{{ $detalle->num_serie_reemplazo }}</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">{{ $detalle->num_inventario }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <p class="">Siendo el caso concluido ya que el equipo fue recibido satisfactoriamente, por el área usuaria que solicito la aplicación de la garantía.
                                    <br>
                                    <br>
                                    Sin más por el momento, quedamos a sus órdenes y expreso que estamos para servirles.
                                    Se firma la presente con fecha de {{ \Carbon\Carbon::parse($Documentos->garantia_cambio->fecha)->translatedFormat('d \d\e F \d\e Y') }}
                                    en la Ciudad de México.
                                </p>

                                <img src="{{ asset('img/garantia_cambio/firma_genaro.jpg') }}" alt="Logo" width="350px" class="mx-auto object-cover rounded my-20">

                            </div>
                            <footer>
                                <p class="text-center text-sm font-bold text-gray-700">
                                    Calle Unión No. 161 Col Escandón 1ra Sección dpto. 22, C.P. 11800
                                    <br>
                                    Delegación Miguel Hidalgo, Ciudad de Mexico RFC AIN040211G2A
                                    <br>
                                    TEL: (993) 3-55-40-05 FAX (993) 1-85-07-54 ventas@arsite.com.mx www.arsite.com.mx
                                </p>
                            </footer>
                        </div>

                        <!-- FIN - VISTA PREVIA REMISIÓN -->

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