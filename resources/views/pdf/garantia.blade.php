<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garantía y/o cambio de equipo</title>

    <style>
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

        .my-10 {
            margin: 35px 0;
        }

        /* Utilidades */
        .fecha {
            text-align: right;
            font-family: Arial;
            font-size: 15px;
        }

        .name-cliente,
        .name-empresa {
            font-size: 18px;
            font-family: Arial;
            margin: 0;
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
            margin: auto;
            width: 100%;
        }

        .table thead {
            background-color: #0070C0;
        }

        .table th,
        .table td {
            padding: 8px 16px;
            border: 1px solid #0070C0;
            /* Establecemos un borde en todas las direcciones */
            text-align: center;
            font-size: 20px;
        }

        .table th {
            text-transform: uppercase;
            font-weight: bold;
        }

        /* Agregamos un borde derecho a las celdas, excepto para la última columna */
        .table th:not(:last-child),
        .table td:not(:last-child) {
            border-right: 1px solid #0070C0;
        }

        .p-tabla {
            font-family: Arial;
            font-size: x-small;

        }

        .contenedor {
            text-align: center
        }

        /* Clases del texto */
        .p-texto {
            font-size: 18px;
            font-family: Arial;
            text-align: justify;
        }
    </style>
</head>

<body>
    <header>
        <p class="fecha">Villahermosa, Tabasco a
            {{ \Carbon\Carbon::parse($documento->garantia_cambio->fecha)->translatedFormat('d \d\e F \d\e Y') }}
        </p>
        <p class="font-semibold name-cliente">{{ $documento->garantia_cambio->empresa->name }}</p>
        <p class="name-cliente">{{ $documento->cliente->name }}</p>
        <p class="name-cliente">{{ $documento->cliente->puesto }}</p>
        <p class="name-cliente">{{ $documento->cliente->departamento }}</p>
        <p class="name-empresa">{{ $documento->garantia_cambio->empresa->ubicacion }}</p>

    </header>
    <p class="p-texto">
        Por medio de la presente yo el <span class="font-bold">C. {{ $documento->user->name }}</span>, en mi carácter de representante legal,
        me dirijo de a usted para informarle que, debido a la aplicación de garantía solicitada con el fabricante,
        <span>{{ $documento->garantia_cambio->descripcion }}</span>
    </p>
    @foreach ($detallesGarantia as $pagina)
    <main>
        <!-- Contenido principal -->
        <h3>Equipo Dañado</h3>
        <table class="table">
            <thead>
                <tr class="uppercase font-semibold">
                    <td>Marca</td>
                    <td>Modelo</td>
                    <td>N. de Serie</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($pagina as $detalle)
                <tr class="p-tabla">
                    <td class="font-semibold">{{ $detalle->marca_danado }}</td>
                    <td>{{ $detalle->modelo_danado }}</td>
                    <td>{{ $detalle->num_serie_danado }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Equipo Reemplazo</h3>
        <table class="table">
            <thead>
                <tr class="uppercase font-semibold">
                    <td>Marca</td>
                    <td>Modelo</td>
                    <td>N. de Serie</td>
                    <td>N. Inventario</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($pagina as $detalle)
                <tr class="p-tabla">
                    <td class="font-semibold">{{ $detalle->marca_reemplazo }}</td>
                    <td>{{ $detalle->modelo_reemplazo }}</td>
                    <td>{{ $detalle->num_serie_reemplazo }}</td>
                    <td>{{ $detalle->num_inventario }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p class="p-texto">Siendo el caso concluido ya que el equipo fue recibido satisfactoriamente, por el área usuaria que solicito la aplicación de la garantía.
            <br>
            <br>
            Sin más por el momento, quedamos a sus órdenes y expreso que estamos para servirles.
            Se firma la presente con fecha de {{ \Carbon\Carbon::parse($documento->garantia_cambio->fecha)->translatedFormat('d \d\e F \d\e Y') }}
            en la Ciudad de México.
        </p>
        {{-- SOLO LA ULTIMA PAGINA --}}
        @if ($loop->last)
        <div class="contenedor">
            <img src="{{ asset('img/garantia_cambio/firma_genaro.jpg') }}" alt="Logo" width="350px">
        </div>
        @endif
    </main>

    @if (!$loop->last)
    <div style="page-break-after: always;"></div> <!-- Agregar salto de página si no es la última página -->
    <div style="height: 10em;"></div>
    @endif
    @endforeach
</body>

</html>