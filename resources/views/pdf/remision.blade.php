<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remision</title>

    <style>
        body {
            margin: 0;
            padding: 0 30px;
            /* Ajusta este valor según la altura de tu footer */
            margin-bottom: 30%;
            /* Ajusta este valor según la altura de tu footer */
        }

        footer {
            padding: 10px;
            font-size: 16px;
            text-align: center;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            font-weight: 600;
        }


        .my-10 {
            margin: 35px 0;
        }

        /* Utilidades */
        .fecha {
            text-align: right;
            font-size: 21px;
        }

        .name-cliente,
        .name-empresa {
            font-size: 25px;
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


        /* Clases de table */
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
            font-size: 20px;
        }

        .table th {
            text-transform: uppercase;
            font-weight: bold;
        }

        /* Agregamos un borde derecho a las celdas, excepto para la última columna */
        .table th:not(:last-child),
        .table td:not(:last-child) {
            border-right: 1px solid #000;
        }
    </style>
</head>

<body>
    <header>
        <img src="{{ asset('img/logo-arsite.png') }}" alt="Logo" width="500px" class="my-7">
        <p class="fecha">Villahermosa, Tabasco a
            {{ \Carbon\Carbon::parse($documento->remision->fecha)->translatedFormat('d \d\e F \d\e Y') }}
        </p>
        <p class="font-semibold name-cliente">{{ $documento->cliente->name }}</p>
        <p class="font-semibold name-empresa">{{ $documento->remision->empresa->name }}</p>
        <h1 class="font-bold uppercase text-center my-10">
            {{ $documento->tipo_documento->name }} de Equipo</h1>
    </header>

    <main>
        <!-- Contenido principal -->
        @foreach ($detallesRemision as $pagina)
            <table class="table">
                <thead>
                    <tr class="uppercase font-semibold">
                        <td>Cantidad</td>
                        <td>Unidad</td>
                        <td class="w-full">Descripción</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pagina as $detalle)
                        <tr>
                            <td>{{ $detalle->cantidad }}</td>
                            <td>{{ $detalle->unidad }}</td>
                            <td class="w-full">{{ $detalle->descripcion }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <img src="{{ asset('img/remision/firmas_remision.jpg') }}" alt="Logo"
                style="object-fit:cover; margin-top:20px;">
                @if (!$loop->last)
                <div style="page-break-after: always;"></div> <!-- Agregar salto de página si no es la última página -->
            @endif
        @endforeach
    </main>

    <footer>
        <p>
            Calle Unión No. 161 Col Escandón 1ra Sección dpto. 22, C.P. 11800
            <br>
            Delegación Miguel Hidalgo, Ciudad de Mexico RFC AIN040211G2A
            <br>
            TEL: (993) 3-55-40-05 FAX (993) 1-85-07-54 <a href="mailto:ventas@arsite.com.mx"> ventas@arsite.com.mx</a>
            <a href="www.arsite.com.mx">www.arsite.com.mx</a>
        </p>
    </footer>
</body>

</html>
