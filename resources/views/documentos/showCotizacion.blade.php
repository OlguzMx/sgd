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
                <div class=" pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900 uppercase">Datos del Documento <span class="uppercase">{{ $Documentos->tipo_documento->name }}</span></h2>
                    <div class="mt-8">

                        <!-- INICIO - VISTA PREVIA COTIZACION -->

                        <div class="sm:col-span-3 border px-3 py-2">
                            <div class="mt-2 mx-24">
                                <img src="{{ asset('img/logo-arsite.png') }}" alt="Logo" width="500px" class="my-7">
                                {{-- Muestra la fecha del documento en el siguiente formato:  XX (dia) de XX (mes) 20XX --}}
                                <p class="text-right">Villahermosa, Tabasco a {{ \Carbon\Carbon::parse($Documentos->cotizacion->fecha)->translatedFormat('d \d\e F \d\e Y') }}</p>
                                <p class="text-right">Folio: {{ $Documentos->cotizacion->folio }}</p>
                                <p class="font-semibold">{{ $Documentos->cotizacion->empresa->name }}</p>
                                <p class="font-semibold">At'n. {{ $Documentos->cliente->name }}</p>
                                <p class="font-semibold">{{ $Documentos->cliente->puesto }}</p>
                                <br>
                                <p class="text-xs"><span class="font-semibold">Ar-Site Integradores, S.A. de C.V.</span> <br>
                                    Calle Músicos 714, Col. Gaviotas Sur, Villahermosa, Tabasco, CP 68090 <br>
                                    RFC: AIN040211G2A <br>
                                    POR ESTE MEDIO ME PERMITO PRESENTAR LA SIGUIENTE COTIZACIÓN</p>
                                <h2 class="font-bold uppercase text-3xl text-center my-10">{{ $Documentos->tipo_documento->name }} de Equipo</h2>

                                <table class="min-w-full table-auto border-collapse my-2 text-sm">
                                    <thead class="text-center text-lg uppercase font-thin bg-blue-300">
                                        <tr>
                                            <td class="border px-4 py-2 font-semibold">Cant.</td>
                                            <td class="border px-4 py-2 font-semibold">Unidad</td>
                                            <td class="border px-4 py-2 font-semibold">N. Parte</td>
                                            <td class="border px-4 py-2 font-semibold">Descripción</td>
                                            <td class="border px-4 py-2 font-semibold">P. Uni.</td>
                                            <td class="border px-4 py-2 font-semibold">Importe</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Documentos->cotizacion->detalles_cotizacion as $detalle)
                                        <tr>
                                            <td class="border px-4 py-2 text-center">{{ $detalle->cantidad }}</td>
                                            <td class="border px-4 py-2 text-center">{{ $detalle->unidad }}</td>
                                            <td class="border px-4 py-2 text-center">{{ $detalle->num_de_parte }}
                                            </td>
                                            <td class="border px-4 py-2">{{ $detalle->descripcion }}</td>
                                            <td class="border px-4 py-2 text-center">
                                                <span class="font-semibold">$</span>{{ number_format($detalle->precio_unitario, 2, '.', ',') }}
                                            </td>
                                            <td class="border px-4 py-2 text-center">
                                                <span class="font-semibold">$</span>{{ number_format($detalle->importe, 2, '.', ',') }}
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="4"></td>
                                            <td class="border px-4 py-2 text-center font-semibold" colspan="1">
                                                Subtotal</td>
                                            <td class="border px-4 py-2 text-center" colspan="1">
                                                <span class="font-semibold">$</span>{{ number_format($Documentos->cotizacion->subtotal, 2, '.', ',') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"></td>
                                            <td class="border px-4 py-2 text-center font-semibold" colspan="1">IVA
                                                (16%)</td>
                                            <td class="border px-4 py-2 text-center" colspan="1">
                                                <span class="font-semibold">$</span>{{ number_format($Documentos->cotizacion->iva, 2, '.', ',') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"></td>
                                            <td class="border px-4 py-2 text-center font-semibold" colspan="1">Total
                                            </td>
                                            <td class="border px-4 py-2 text-center" colspan="1">
                                                <span class="font-semibold">$</span>{{ number_format($Documentos->cotizacion->total, 2, '.', ',') }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p class="text-xs"><span class="font-semibold">Condiciones Comerciales:</span> <br>
                                    *Precios expresados en moneda nacional (MXN) <br>
                                    *Tiempo de Entrega: 2 a 3 semanas <br>
                                    *Forma de Pago: contado <br>
                                    *Vigencia de esta cotización: 30 días</p>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <footer class="py-8 flex flex-wrap justify-between items-center">
                                <!-- Parte inferior izquierda -->
                                <div class="w-full md:w-1/3 text-center md:text-left mb-4 md:mb-0">
                                    <img src="{{ asset('img/cotizacion/firma-ing.jpg') }}" alt="Firma" width="150" class="w-24 h-24 object-cover rounded-full mx-auto md:mx-0 md:mr-4 mb-2">
                                    <div>
                                        <p class="font-bold">Ing. Isaías García Gordillo</p>
                                        <p>Director</p>
                                        <p>Ar-Site Integradores, S.A. de C.V.</p>
                                    </div>
                                </div>

                                <!-- Parte inferior central -->
                                <div class="w-full md:w-1/3 text-center mb-4 md:mb-0">
                                    <img src="{{ asset('img/cotizacion/marcas-cotizacion.jpg') }}" alt="Logo" width="400px">
                                </div>

                                <!-- Parte inferior derecha -->
                                <div class="w-full md:w-1/3 text-center md:text-right">
                                    <p class="font-bold">Información de la empresa</p>
                                    <p>AR-SITE INTEGRADORES SA DE CV</p>
                                    <p>TEL. 9933657804 <br>
                                        5563903399</p>
                                    <p>VENTAS@ARSITE.COM.MX <br>
                                        <a href="http://WWW.ARSITE.COM.MX" class="text-blue-500">WWW.ARSITE.COM.MX</a>
                                    </p>
                                </div>
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