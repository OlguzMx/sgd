<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de Compra</title>


    <style>
        /* UTILIDADES GLOBALES */
        body {
            margin: 0;
            padding: 0 30px;
            /* Ajusta este valor según la altura de tu footer */

        }

        footer {
            padding: 10px;
            font-size: 16px;
            text-align: center;
            width: 100%;
            font-weight: 600;
            clear: both;
            /* Asegura que el footer se coloque después de todo el contenido */
        }

        p {
            margin: 0;
        }

        .my-10 {
            margin: 35px 0;
        }

        /* Utilidades */
        .fecha {
            text-align: right;
            font-size: 21px;
        }

        .text-center {
            text-align: center;
        }

        .font-semibold {
            font-weight: 600;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .border {
            border-width: 1px;
        }

        .w-full {
            width: 100%;
        }

        .titulo {
            text-align: right;
        }

        /* Clases de la tabla*/
        .table {
            border-collapse: collapse;
            /* border-width: 1px; */
            width: 100%;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .table thead {
            background-color: #2E86C1;
        }

        .table th,
        .table td {
            /* padding: 8px 16px; */
            border: 1px solid #000;
            text-align: center;
            font-size: 12px;
            font-family: 'Century Gothic';
        }

        .table th {
            text-transform: uppercase;
            font-weight: bold;
        }

        .table td {
            padding: 5px 10px;
        }

        /* Estilos para la tabla de DATOS DEL CLIENTE FINAL (TEXTO DEL TBODY) */
        .tbody-texto {
            text-align: left;
            font-size: 13px;
            font-family: Arial;
        }

        .tb-cliente {
            font-size: 10px;
            padding-top: 2px;
            margin-top: 5px;
            margin-bottom: 5px;
            height: 50%;
        }

        .tb-texto {
            margin-top: 5px;
            font-size: 8px;
            font-family: 'Arial Narrow';

        }

        .tb-firma {
            width: 35%;

        }

        .tbfirma-texto {
            text-align: center;
            font-size: 13px;
            font-family: Arial;
        }

        .datos-cliente {
            font-size: medium;
            text-align: center;
        }

        .tb-1 {
            display: inline-block;
            /* Asegura que el elemento es un bloque */
            padding: 5px;
            padding-left: 10px;
            padding-right: 20px;
            border: 2px solid #5DADE2;
            border-radius: 1rem;
            font-size: 15px;
            width: 45%;
            margin: 2px;
            /* TEXTO */
            font-family: Calibri;
            font-size: 15px;
        }

        .tb-2 {
            display: inline-block;
            /* Asegura que el elemento es un bloque */
            padding: 5px;
            padding-left: 10px;
            padding-right: 20px;
            padding-bottom: 5px;
            padding-top: 20px;
            height: auto;
            border: 2px solid #5DADE2;
            border-radius: 1rem;
            font-size: 15px;
            width: 45%;
            margin: 2px;
            /* TEXTO */
            font-family: Calibri;
            font-size: 15px;
        }

        .tb-3 {
            display: inline-block;
            /* Asegura que el elemento es un bloque */
            padding: 5px;
            padding-left: 10px;
            padding-right: 130px;
            padding-bottom: 8px;
            height: auto;
            border: 2px solid #5DADE2;
            border-radius: 1rem;
            font-size: 15px;
            margin: 2px;
            /* TEXTO */
            font-family: Calibri;
            font-size: 15px;
        }

        .tb-4 {
            display: inline-block;
            /* Asegura que el elemento es un bloque */
            padding: 5px;
            padding-left: 10px;
            padding-right: 188px;
            height: auto;
            border: 2px solid #5DADE2;
            border-radius: 1rem;
            font-size: 15px;
            margin: 2px;

            /* TEXTO */
            font-family: Calibri;
            font-size: 15px;
        }
    </style>
</head>

<body>
    <header>
        <p class="titulo px-6 font-bold">Orden de Compra</p>
        <div class="">
            <div class="tb-1">
                <p class="font-bold">Proveedor: <span class="font-normal">{{ $documento->orden_compra->proveedor->name }}</span>
                </p>
                <p class="font-bold">Dirección: <span class="font-normal">{{ $documento->orden_compra->proveedor->direccion }}</span>
                </p>
                <p class="font-bold">Contacto: <span class="font-normal">{{ $documento->orden_compra->proveedor->name_contacto }}</span>
                </p>
                <p class="font-bold">Teléfono: <span class="font-normal">{{ $documento->orden_compra->proveedor->telefono }}</span>
                </p>
            </div>

            <div class="tb-2">
                <p class="font-bold">Orden de Compra: <span class="font-normal">{{ $documento->orden_compra->num_orden_compra }}</span>
                </p>
                <p class="font-bold">Fecha: <span class="font-normal">
                        {{ \Carbon\Carbon::parse($documento->orden_compra->fecha)->translatedFormat('d/m/Y') }}
                    </span></p>
                <p class="font-bold">Nombre del Proyecto: <span class="font-normal">{{ $documento->orden_compra->nombre_proyecto }}</span>
                </p>
                <br>
            </div>
            <div class="tb-3">
                <p class="font-bold">Condiciones Comerciales: <span class="font-normal">60 días
                        de crédito</span></p>
                <br>
            </div>
            <div class="tb-4">
                <p class="font-bold">Tiempo de entrega: <span class="font-normal">por confirmar</span>
                </p>
                <p class="font-bold">Moneda: <span class="font-normal">Dórales</span></p>
            </div>
        </div>
        @foreach ($detallesOrden as $pagina)
        <main>
            <!-- Contenido principal -->
            <table class="table" >
                <thead>
                    <tr class="uppercase font-semibold">
                        <td>Cant.</td>
                        <td>N. Parte</td>
                        <td>Descripcion</td>
                        <td>P. Uni.</td>
                        <td>Importe</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pagina as $detalle)
                    <tr class="tb-texto">
                        <td>{{ $detalle->cantidad }}</td>
                        <td>{{ $detalle->num_de_parte }}</td>
                        <td>{{ $detalle->descripcion }}</td>
                        <td>${{ number_format($detalle->precio_unitario, 2, '.', ',') }}</td>
                        <td>${{ number_format($detalle->importe, 2, '.', ',') }}</td>
                    </tr>
                    @endforeach
                    <tr class="tb-texto">
                        <td colspan="3" style="border: none;"></td>
                        <td class="border px-4 py-2 text-center font-semibold" colspan="1">
                            Subtotal</td>
                        <td class="border px-4 py-2 text-center" colspan="1">
                            <span class="font-semibold">$</span>{{ number_format($documento->orden_compra->subtotal, 2, '.', ',') }}
                        </td>
                    </tr>
                    <tr class="tb-texto">
                        <td colspan="3" style="border: none;"></td>
                        <td class="border px-4 py-2 text-center font-semibold" colspan="1">IVA
                            (16%)</td>
                        <td class="border px-4 py-2 text-center" colspan="1">
                            <span class="font-semibold">$</span>{{ number_format($documento->orden_compra->iva, 2, '.', ',') }}
                        </td>
                    </tr>
                    <tr class="tb-texto">
                        <td colspan="3" style="border: none;"></td>
                        <td class="border px-4 py-2 text-center font-semibold" colspan="1">Total
                        </td>
                        <td class="border px-4 py-2 text-center" colspan="1">
                            <span class="font-semibold">$</span>{{ number_format($documento->orden_compra->total, 2, '.', ',') }}
                        </td>
                    </tr>
                </tbody>
            </table>
            @if ($loop->last)
            <table class="table tb-cliente" style="page-break-inside: avoid;">
                <tbody>
                    <tr class="uppercase font-semibold">
                        <!-- TABLA: DATOS DEL CLIENTE FINAL -->
                        <td colspan="2">
                            <p class="datos-cliente">Datos del Cliente Final</p>
                        </td>
                        <!-- TABLA: DIRECCIÓN DE ENTREGA -->
                        <td colspan="2">
                            <p class="datos-cliente">Direccion de entrega</p>
                        </td>
                    </tr>
                    <tr>
                        <!-- TABLA: DATOS DEL CLIENTE FINAL -->
                        <td>
                            <p class="tbody-texto">Nombre</p>
                        </td>
                        <td>
                            <p class="tbody-texto">{{ $documento->orden_compra->empresa->name }}</p>
                        </td>
                        <!-- TABLA: DIRECCIÓN DE ENTREGA -->
                        <td>
                            <p class="tbody-texto">Nombre</p>
                        </td>
                        <td>
                            <p class="tbody-texto">{{ $documento->orden_compra->name_cliente }}</p>
                        </td>
                    </tr>
                    <tr>
                        <!-- TABLA: DATOS DEL CLIENTE FINAL -->
                        <td>
                            <p class="tbody-texto">Domicilio Cliente Final: </p>
                        </td>
                        <td>
                            <p class="tbody-texto">{{ $documento->orden_compra->empresa->direccion }}</p>
                        </td>
                        <!-- TABLA: DIRECCIÓN DE ENTREGA -->
                        <td>
                            <p class="tbody-texto">Domicilio</p>
                        </td>
                        <td>
                            <p class="tbody-texto">{{ $documento->orden_compra->domicilio }}</p>
                        </td>
                    </tr>
                    <tr>
                        <!-- TABLA: DATOS DEL CLIENTE FINAL -->
                        <td>
                            <p class="tbody-texto">Ciudad y Estado</p>
                        </td>
                        <td>
                            <p class="tbody-texto">{{ $documento->orden_compra->empresa->ubicacion }}</p>
                        </td>
                        <!-- TABLA: DIRECCIÓN DE ENTREGA -->
                        <td>
                            <p class="tbody-texto">Ciudad y Estado</p>
                        </td>
                        <td>
                            <p class="tbody-texto">{{ $documento->orden_compra->ubicacion }}</p>
                        </td>
                    </tr>
                    <tr>
                        <!-- TABLA: DATOS DEL CLIENTE FINAL -->
                        <td>
                            <p class="tbody-texto">Código Postal</p>
                        </td>
                        <td>
                            <p class="tbody-texto"> {{ $documento->orden_compra->empresa->codigo_postal }}</p>
                        </td>
                        <!-- TABLA: DIRECCIÓN DE ENTREGA -->
                        <td>
                            <p class="tbody-texto">Código Postal</p>
                        </td>
                        <td>
                            <p class="tbody-texto">{{ $documento->orden_compra->codigo_postal }}</p>
                        </td>
                    </tr>
                    <tr>
                        <!-- TABLA: DATOS DEL CLIENTE FINAL -->
                        <td>
                            <p class="tbody-texto">Contacto cliente final</p>
                        </td>
                        <td>
                            <p class="tbody-texto">{{ $documento->orden_compra->cliente->name }}</p>
                        </td>
                        <!-- TABLA: DIRECCIÓN DE ENTREGA -->
                        <td>
                            <p class="tbody-texto">Contacto Cliente</p>
                        </td>
                        <td>
                            <p class="tbody-texto">{{ $documento->orden_compra->contacto_cliente }}</p>
                        </td>
                    </tr>
                    <tr>
                        <!-- TABLA: DATOS DEL CLIENTE FINAL -->
                        <td>
                            <p class="tbody-texto">Teléfono</p>
                        </td>
                        <td>
                            <p class="tbody-texto">{{ $documento->orden_compra->cliente->num_fijo }}</p>
                        </td>
                        <!-- TABLA: DIRECCIÓN DE ENTREGA -->
                        <td>
                            <p class="tbody-texto">Teléfono</p>
                        </td>
                        <td>
                            <p class="tbody-texto">{{ $documento->orden_compra->tel_cliente }}</p>
                        </td>
                    </tr>
                    <tr>
                        <!-- TABLA: DATOS DEL CLIENTE FINAL -->
                        <td>
                            <p class="tbody-texto">Email</p>
                        </td>
                        <td>
                            <p class="tbody-texto"> {{ $documento->orden_compra->cliente->email }}</p>
                        </td>
                        <!-- TABLA: DIRECCIÓN DE ENTREGA -->
                        <td>
                            <p class="tbody-texto">Email</p>
                        </td>
                        <td>
                            <p class="tbody-texto">{{ $documento->orden_compra->email_cliente }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table tb-firma">
                <tbody>
                    <tr>
                        <td>
                            <p class="tbody-texto">Datos de Facturación</p>
                        </td>
                        <td style="border: none;">
                            <p class="tbfirma-texto">Atentamente:</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="tbody-texto">AR-SITE INTEGRADORES S.A.DE C.V. <br>
                                RFC: AIN040211G2A Calle Musicos 714 <br>
                                Col. Gaviotas Sur C.P. 86090 <br>
                                Villahermosa Tabasco.</p>
                        </td>
                        <td style="border: none;">
                            <div>
                                <div class="tbfirma-texto">
                                    <img src="{{ asset('img/orden_compra/firma_ing.jpg') }}" alt="Logo" width="80px" style="object-fit:cover;">
                                    <p>Ing. Isaias Garcia Gordillo</p>
                                    <p>Director General</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            {{-- SOLO LA ULTIMA PAGINA --}}
        </main>
        @endif
        @endforeach
</body>

</html>