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
                                <table class="table-auto">
                                    <tbody>
                                        <tr>
                                            <th scope="col">Proveedor: </th>
                                            <td>
                                                <p class="font-bold">{{ $Documentos->orden_compra->proveedor->name }}</p>
                                            </td>
                                            <th scope="col">Orden de Compra: </th>
                                            <td>
                                                <p class="font-bold">{{ $Documentos->orden_compra->num_orden_compra }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Dirección:</th>
                                            <td>
                                                <p class="font-bold">{{ $Documentos->orden_compra->proveedor->direccion }}</p>
                                            </td>
                                            <th scope="col">Fecha:</th>
                                            <td>
                                                <p class="text-right">CDMX a {{ \Carbon\Carbon::parse($Documentos->orden_compra->fecha)->translatedFormat('d \d\e F \d\e Y') }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Contacto:</th>
                                            <td>
                                                <p class="font-bold">{{ $Documentos->orden_compra->proveedor->name_contacto }}</p>
                                            </td>
                                            <th scope="col">Nombre del Proyecto:</th>
                                            <td>
                                                <p class="font-bold">{{ $Documentos->orden_compra->nombre_proyecto }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Teléfono:</th>
                                            <td>
                                                <p class="font-bold">{{ $Documentos->orden_compra->proveedor->telefono }}</p>
                                            </td>
                                            <th scope="col">Tiempo de entrega:</th>
                                            <td>
                                                <p class="font-bold">{{ $Documentos->orden_compra->tiempo_entrega }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Condiciones Comerciales:</th>
                                            <td>
                                                <p class="font-bold">60 días de crédito</p>
                                            </td>
                                            <th scope="col">Moneda:</th>
                                            <td>
                                                <p class="font-bold">{{ $Documentos->orden_compra->moneda }}</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                                <h2 class="font-bold uppercase text-3xl text-center my-4">{{ $Documentos->tipo_documento->name }}</h2>
                                <table class="min-w-full table-auto border-collapse border border-slate-500 my-2 text-sm">
                                    <thead class="text-center text-lg uppercase font-thin border border-slate-600 bg-gray-400">
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2">Cantidad</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">Núm. de Parte</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">Descripción</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">Precio Unitario</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">Importe</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Documentos->orden_compra->detalles_orden_compra as $detalle)
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2 text-center">{{ $detalle->cantidad }}</td>
                                            <td class="border-collapse border border-slate- px-4 py-2 text-center">{{ $detalle->num_de_parte }}</td>
                                            <td class="border-collapse border border-slate- px-4 py-2 text-center">{{ $detalle->descripcion }}</td>
                                            <td class="border-collapse border border-slate- px-4 py-2 text-center">{{ '$' . number_format($detalle->precio_unitario, 2, '.', ',') }}</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">{{ '$' . number_format($detalle->importe, 2, '.', ',') }}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2 text-right" colspan="4">Subtotal</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">{{ '$' . number_format($Documentos->orden_compra->subtotal, 2, '.', ',') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2 text-right" colspan="4">IVA (16 %)</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">{{ '$' . number_format($Documentos->orden_compra->iva, 2, '.', ',') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2 text-right" colspan="4">Total</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">{{ '$' . number_format($Documentos->orden_compra->total, 2, '.', ',') }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table class="table-auto border-collapse border border-slate-500 my-2 text-sm">
                                    <thead class="text-center text-lg uppercase font-thin border border-slate-600 bg-gray-400">
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2" colspan="2">Dirección de entrega</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2">Nombre de Cliente</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">{{ $Documentos->orden_compra->empresa->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2">Domicilio</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">{{ $Documentos->orden_compra->empresa->direccion }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2">Ciudad, Estado</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">{{ $Documentos->orden_compra->empresa->ubicacion }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2">Codigo Postal</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">{{ $Documentos->orden_compra->empresa->codigo_postal }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2">Contacto Cliente</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">{{ $Documentos->orden_compra->cliente->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2">Teléfono</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">{{ $Documentos->orden_compra->cliente->num_fijo }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2">Email</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">{{ $Documentos->orden_compra->cliente->email }}</td>
                                        </tr>
                                    </tbody>
                                    <thead class="text-center text-lg uppercase font-thin border border-slate-600 bg-gray-400">
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2" colspan="2">Datos del Cliente final</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2">Nombre de Cliente</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">{{ $Documentos->orden_compra->empresa->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2">Domicilio Cliente Final</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">{{ $Documentos->orden_compra->empresa->direccion }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2">Ciudad, Estado</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">{{ $Documentos->orden_compra->empresa->ubicacion }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2">Codigo Postal</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">{{ $Documentos->orden_compra->empresa->codigo_postal }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2">Contacto Cliente Final</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">{{ $Documentos->orden_compra->cliente->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2">Teléfono</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">{{ $Documentos->orden_compra->cliente->num_fijo }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2">Email</td>
                                            <td class="border-collapse border border-slate- px-4 py-2">{{ $Documentos->orden_compra->cliente->email }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table-auto border-collapse border border-slate-500 my-2 text-sm">
                                    <thead class="text-center text-lg uppercase font-thin border border-slate-600 bg-gray-400">
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2">Datos de Facturación</td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border-collapse border border-slate- px-4 py-2">
                                                <p>AR-SITE INTEGRADORES S.A.DE C.V. <br>
                                                    RFC: AIN040211G2A Calle Musicos 714 <br>
                                                    Col. Gaviotas Sur C.P. 86090 <br>
                                                    Villahermosa Tabasco,</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <img src="{{ asset('img/orden_compra/firma_ing.jpg') }}" alt="Logo" width="320px" class="object-cover rounded">

                            </div>
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