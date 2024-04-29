<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotización</title>

    <style>
        body {
            margin: 0;
            padding: 0 30px;
            /* Ajusta este valor según la altura de tu footer */

        }

        footer {
            padding: 10px;
            font-size: 16px;
            text-align: end;
            width: 100%;
            font-weight: 600;
            clear: both;
            /* Asegura que el footer se coloque después de todo el contenido */
        }

        .my-10 {
            margin: 35px 0;
        }

        /* Utilidades */
        .fecha,
        .folio {
            text-align: right;
            margin: 0;
            font-family: Arial;
            font-size: 12px;
        }

        .name-cliente,
        .name-empresa {
            font-size: 15px;
            margin: 0;
            font-family: Arial;
        }

        .info-arsite {
            font-size: 13px;
            font-family: Calibri;
        }

        .info-condiciones {
            font-family: Arial;
            font-size: 13px;
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

        /* Clases de la tabla*/
        .table {
            border-collapse: collapse;
            border-width: 1px;
        }

        .table thead {
            background-color: #c4c5c6;
        }

        .table th,
        .table td {
            padding: 8px 16px;
            border: 1px solid #000;
            /* Establecemos un borde en todas las direcciones */
            text-align: center;
            font-size: 15px;
        }

        .table th {
            text-transform: uppercase;
            font-weight: bold;
            font-family: Arial;
        }

        .tb-texto{
            font-family: Calibri;
        }
        /* Agregamos un borde derecho a las celdas, excepto para la última columna */
        .table th:not(:last-child),
        .table td:not(:last-child) {
            border-right: 1px solid #000;
        }

        .yellow-box {
            background-color: yellow;
            padding: 6px;
            border: solid 1px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <header>
        <p class="fecha">Villahermosa, Tabasco a
            {{ \Carbon\Carbon::parse($documento->cotizacion->fecha)->translatedFormat('d \d\e F \d\e Y') }}
        </p>
        <p class="folio">Folio: {{ $documento->cotizacion->folio }}
        </p>
        <p class="text-sm font-semibold name-cliente">{{ $documento->cotizacion->empresa->name }}</p>
        <p class="text-sm font-semibold name-cliente">At'n. {{ $documento->cliente->name }}</p>
        <p class="text-sm font-semibold name-cliente">{{ $documento->cliente->puesto }}</p>
        <p class="info-arsite"><span class="font-semibold">Ar-Site Integradores, S.A. de C.V.</span> <br>
            Calle Músicos 714, Col. Gaviotas Sur, Villahermosa, Tabasco, CP 68090 <br>
            RFC: AIN040211G2A <br>
            POR ESTE MEDIO ME PERMITO PRESENTAR LA SIGUIENTE COTIZACIÓN</p>

    </header>
    @foreach ($detallesCotizacion as $pagina)
    <main>
        <!-- Contenido principal -->
        <table class="table">
            <thead>
                <tr class="text-sm uppercase font-semibold">
                    <td>Cant.</td>
                    <td>Unidad</td>
                    <td>N. Parte</td>
                    <td>Descripcion</td>
                    <td>P. Uni.</td>
                    <td>Importe</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($pagina as $detalle)
                <tr>
                    <td>
                        {{ $detalle->cantidad }}
                    </td>
                    <td>
                        {{ $detalle->unidad }}
                    </td>
                    <td>
                        {{ $detalle->num_de_parte }}
                    </td>
                    <td>
                        {{ $detalle->descripcion }}
                    </td>
                    <td>
                        <span class="font-semibold">$</span>{{ number_format($detalle->precio_unitario, 2, '.', ',') }}
                    </td>
                    <td>
                        <span class="font-semibold">$</span>{{ number_format($detalle->importe, 2, '.', ',') }}
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4" style="border: none;"></td>
                    <td class="border px-4 py-2 text-center font-semibold" colspan="1">
                        SUBTOTAL</td>
                    <td class="border px-4 py-2 text-center" colspan="1">
                        <span class="font-semibold">$</span>{{ number_format($documento->cotizacion->subtotal, 2, '.', ',') }}
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="border: none;"></td>
                    <td class="border px-4 py-2 text-center font-semibold" colspan="1">IVA
                        (16%)</td>
                    <td class="border px-4 py-2 text-center" colspan="1">
                        <span class="font-semibold">$</span>{{ number_format($documento->cotizacion->iva, 2, '.', ',') }}
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="border: none;"></td>
                    <td class="border px-4 py-2 text-center font-semibold" colspan="1">TOTAL
                    </td>
                    <td class="border px-4 py-2 text-center" colspan="1">
                        <span class="font-semibold">$</span>{{ number_format($documento->cotizacion->total, 2, '.', ',') }}
                    </td>
                </tr>
            </tbody>
        </table>

        <p class="info-condiciones"><span class="font-semibold">Condiciones Comerciales:</span> <br>
            *Precios expresados en moneda nacional (MXN) <br>
            *Tiempo de Entrega: 2 a 3 semanas <br>
            *Forma de Pago: contado <br>
            *Vigencia de esta cotización: 30 días</p>
        {{-- SOLO LA ULTIMA PAGINA --}}
    </main>

    @if (!$loop->last)
    <div style="page-break-after: always;"></div> <!-- Agregar salto de página si no es la última página -->
    <div style="height: 10em;"></div>
    @endif
    @endforeach
</body>

</html>