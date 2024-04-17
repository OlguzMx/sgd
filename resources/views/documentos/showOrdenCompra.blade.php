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

                        <!-- INICIO - VISTA PREVIA ORDE DE COMPRA -->

                        <div class="border px-3 py-6 rounded-sm">
                            <div class="mt-2">
                                <img src="{{ asset('img/logo-arsite.png') }}" alt="Logo" width="400px"
                        class="my-8">
                        <!-- Muestra la fecha del documento en el siguiente formato: XX (dia) de XX (mes) 20XX -->
                        <p class="text-right px-6 font-bold">Orden de Compra</p>
                        <div class="grid grid-cols-2 gap-2 p-4">
                            <div style="background-color:yellow; padding:6px; border:solid 1px; border-radius:10px;">
                                <p class="font-bold">Proveedor: <span class="font-normal">{{ $Documentos->orden_compra->proveedor->name }}</span>
                                </p>
                                <p class="font-bold">Dirección: <span class="font-normal">{{ $Documentos->orden_compra->proveedor->direccion }}</span>
                                </p>
                                <p class="font-bold">Contacto: <span class="font-normal">{{ $Documentos->orden_compra->proveedor->name_contacto }}</span>
                                </p>
                                <p class="font-bold">Teléfono: <span class="font-normal">{{ $Documentos->orden_compra->proveedor->telefono }}</span>
                                </p>
                            </div>

                            <div style="background-color:yellow; padding:6px; border:solid 1px; border-radius:10px;">
                                <p class="font-bold">Orden de Compra: <span class="font-normal">{{ $Documentos->orden_compra->num_orden_compra }}</span>
                                </p>
                                <p class="font-bold">Fecha: <span class="font-normal">CDMX a
                                        {{ \Carbon\Carbon::parse($Documentos->orden_compra->fecha)->translatedFormat('d \d\e F \d\e Y') }}
                                    </span></p>
                                <p class="font-bold">Nombre del Proyecto: <span class="font-normal">{{ $Documentos->orden_compra->nombre_proyecto }}</span>
                                </p>
                            </div>
                            <div style="background-color:yellow; padding:6px; border:solid 1px; border-radius:10px;">
                                <p class="font-bold">Condiciones Comerciales: <span class="font-normal">60 días
                                        de crédito</span></p>
                            </div>
                            <div style="background-color:yellow; padding:6px; border:solid 1px; border-radius:10px;">
                                <p class="font-bold">Tiempo de entrega: <span class="font-normal">{{ $Documentos->orden_compra->tiempo_entrega }}</span>
                                </p>
                                <p class="font-bold">Moneda: <span class="font-normal">{{ $Documentos->orden_compra->moneda }}</span></p>
                            </div>
                        </div>

                        <h2 class="font-bold uppercase text-3xl text-center my-4">
                            {{ $Documentos->tipo_documento->name }}
                        </h2>
                        <table class="min-w-full table-auto border-collapse my-2 text-sm">
                            <thead class="text-center text-lg uppercase font-thin bg-blue-300">
                                <tr>
                                    <td class="border px-4 py-2 font-semibold">Cant.</td>
                                    <td class="border px-4 py-2 font-semibold">N. Parte</td>
                                    <td class="border px-4 py-2 font-semibold">Descripción</td>
                                    <td class="border px-4 py-2 font-semibold">P. Uni.</td>
                                    <td class="border px-4 py-2 font-semibold">Importe</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Documentos->orden_compra->detalles_orden_compra as $detalle)
                                <tr>
                                    <td class="border px-4 py-2 text-center">{{ $detalle->cantidad }}</td>
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
                                    <td colspan="3"></td>
                                    <td class="border px-4 py-2 text-center font-semibold" colspan="1">
                                        Subtotal</td>
                                    <td class="border px-4 py-2 text-center" colspan="1">
                                        <span class="font-semibold">$</span>{{ number_format($Documentos->orden_compra->subtotal, 2, '.', ',') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td class="border px-4 py-2 text-center font-semibold" colspan="1">IVA
                                        (16%)</td>
                                    <td class="border px-4 py-2 text-center" colspan="1">
                                        <span class="font-semibold">$</span>{{ number_format($Documentos->orden_compra->iva, 2, '.', ',') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td class="border px-4 py-2 text-center font-semibold" colspan="1">Total
                                    </td>
                                    <td class="border px-4 py-2 text-center" colspan="1">
                                        <span class="font-semibold">$</span>{{ number_format($Documentos->orden_compra->total, 2, '.', ',') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>



                        <table class="border-collapse">
                            <tbody>
                                <tr>
                                    <td class="border-collapse px-4 py-2 bg-blue-300">

                                    </td>
                                    <td class="border-collapse px-4 py-2 bg-blue-300 w-1/2">
                                        <p class="font-bold text-center">Datos del Cliente Final</p>
                                    </td>
                                    <td class="border-collapse border-l 200 py-2 bg-blue-300 w-1/3">
                                        <p class="font-bold text-center">Datos de Facturación</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-collapse border 200 px-4 py-2 font-bold">Nombre de Cliente
                                    </td>
                                    <td class="border-collapse border 200 px-4 py-2">
                                        {{ $Documentos->orden_compra->empresa->name }}
                                    </td>
                                    <td class="border-collapse border 200 px-4 py-2">
                                        AR-SITE INTEGRADORES S.A.DE C.V. <br>
                                        RFC: AIN040211G2A Calle Musicos 714 <br>
                                        Col. Gaviotas Sur C.P. 86090 <br>
                                        Villahermosa Tabasco.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-collapse border  px-4 py-2 font-bold">Domicilio Cliente
                                        Final</td>
                                    <td class="border-collapse border  px-4 py-2">
                                        {{ $Documentos->orden_compra->empresa->direccion }}
                                    </td>
                                    <td class="border-collapse  px-4 py-2">
                                        <div class="flex flex-col items-center">
                                            <div>
                                                <p>Atentamente:</p>
                                                <br>
                                                <p>Ing. Isaias Garcia Gordillo</p>
                                                <p>Director General</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-collapse border  px-4 py-2 font-bold">Ciudad y Estado</td>
                                    <td class="border-collapse border  px-4 py-2">
                                        {{ $Documentos->orden_compra->empresa->ubicacion }}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="border-collapse border  px-4 py-2 font-bold">Código Postal</td>
                                    <td class="border-collapse border  px-4 py-2">
                                        {{ $Documentos->orden_compra->empresa->codigo_postal }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-collapse border  px-4 py-2 font-bold">Contacto cliente
                                        final</td>
                                    <td class="border-collapse border  px-4 py-2">
                                        {{ $Documentos->orden_compra->cliente->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-collapse border  px-4 py-2 font-bold">Teléfono</td>
                                    <td class="border-collapse border  px-4 py-2">
                                        {{ $Documentos->orden_compra->cliente->num_fijo }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-collapse border  px-4 py-2 font-bold">Email</td>
                                    <td class="border-collapse border  px-4 py-2">
                                        {{ $Documentos->orden_compra->cliente->email }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="border-collapse">
                            <tbody>
                                <tr>
                                <tr>
                                    <td class="border-collapse px-4 py-2 bg-blue-300">

                                    </td>
                                    <td class="border-collapse py-2 bg-blue-300 w-1/2">
                                        <p class="font-bold text-center">Direccion de entrega</p>
                                    </td>
                                    <td class=" w-1/3">

                                    </td>
                                </tr>
                                </tr>
                                <tr>
                                    <td class="border-collapse border  px-4 py-2 font-bold">Nombre del Cliente
                                    </td>
                                    <td class="border-collapse border  px-4 py-2"> {{ $Documentos->orden_compra->empresa->name }}</td>
                                </tr>
                                <tr>
                                    <td class="border-collapse border  px-4 py-2 font-bold">Domicilio</td>
                                    <td class="border-collapse border  px-4 py-2">{{ $Documentos->orden_compra->empresa->direccion }}</td>
                                </tr>
                                <tr>
                                    <td class="border-collapse border  px-4 py-2 font-bold">Ciudad y Estado</td>
                                    <td class="border-collapse border  px-4 py-2">{{ $Documentos->orden_compra->empresa->ubicacion }}</td>
                                </tr>
                                <tr>
                                    <td class="border-collapse border  px-4 py-2 font-bold">Código Postal</td>
                                    <td class="border-collapse border  px-4 py-2">{{ $Documentos->orden_compra->empresa->codigo_postal }}</td>
                                </tr>
                                <tr>
                                    <td class="border-collapse border  px-4 py-2 font-bold">Contacto Cliente</td>
                                    <td class="border-collapse border  px-4 py-2">{{ $Documentos->orden_compra->cliente->name }}</td>
                                </tr>
                                <tr>
                                    <td class="border-collapse border  px-4 py-2 font-bold">Teléfono</td>
                                    <td class="border-collapse border  px-4 py-2">{{ $Documentos->orden_compra->cliente->num_fijo }}</td>
                                </tr>
                                <tr>
                                    <td class="border-collapse border  px-4 py-2 font-bold">Email</td>
                                    <td class="border-collapse border  px-4 py-2">{{ $Documentos->orden_compra->cliente->email }}</td>
                                </tr>
                            </tbody>
                        </table>


                    </div>
                </div>
                <!-- FIN - VISTA PREVIA ORDE DE COMPRA -->

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