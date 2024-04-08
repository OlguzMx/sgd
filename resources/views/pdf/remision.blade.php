<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remision</title>
    <style>
        /* Estilos para el contenedor principal */
        .bg-white {
            background-color: #ffffff;
        }

        .overflow-hidden {
            overflow: hidden;
        }

        .shadow-xl {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .sm\:rounded-lg {
            border-radius: 0.375rem;
            /* 6px */
        }

        .px-8 {
            padding-left: 2rem;
            /* 32px */
            padding-right: 2rem;
            /* 32px */
        }

        .py-2 {
            padding-top: 0.5rem;
            /* 8px */
            padding-bottom: 0.5rem;
            /* 8px */
        }

        /* Estilos para el contenedor con borde inferior */
        .border-b {
            border-bottom-width: 1px;
        }

        .border-gray-900 {
            border-color: #1a202c;
            /* Color de borde */
        }

        .pb-12 {
            padding-bottom: 3rem;
            /* 48px */
        }

        /* Estilos para el título */
        .text-base {
            font-size: 1.125rem;
            /* 18px */
        }

        .font-semibold {
            font-weight: 600;
        }

        .text-gray-900 {
            color: #1a202c;
            /* Color de texto */
        }

        /* Estilos para el contenedor de cuadrícula */
        .grid {
            display: grid;
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        .gap-x-2 {
            column-gap: 0.5rem;
            /* 8px */
        }

        .gap-y-2 {
            row-gap: 0.5rem;
            /* 8px */
        }

        .md\:grid-cols-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        /* Estilos para los elementos de la vista previa */
        .border {
            border-width: 1px;
        }

        .px-3 {
            padding-left: 0.75rem;
            /* 12px */
            padding-right: 0.75rem;
            /* 12px */
        }

        .py-2 {
            padding-top: 0.5rem;
            /* 8px */
            padding-bottom: 0.5rem;
            /* 8px */
        }

        /* Estilos para la imagen */
        .mx-24 {
            margin-left: 6rem;
            /* 96px */
            margin-right: 6rem;
            /* 96px */
        }

        .my-7 {
            margin-top: 1.75rem;
            /* 28px */
            margin-bottom: 1.75rem;
            /* 28px */
        }

        /* Estilos para el texto */
        .text-right {
            text-align: right;
        }

        /* Estilos para la tabla */
        .border-collapse {
            border-collapse: collapse;
        }

        .text-lg {
            font-size: 1.125rem;
            /* 18px */
        }

        .uppercase {
            text-transform: uppercase;
        }

        .font-thin {
            font-weight: 100;
        }

        .px-4 {
            padding-left: 1rem;
            /* 16px */
            padding-right: 1rem;
            /* 16px */
        }

        .py-2 {
            padding-top: 0.5rem;
            /* 8px */
            padding-bottom: 0.5rem;
            /* 8px */
        }

        /* Estilos para el pie de página */
        .text-center {
            text-align: center;
        }

        .text-sm {
            font-size: 0.875rem;
            /* 14px */
        }

        .font-bold {
            font-weight: bold;
        }

        .text-gray-700 {
            color: #4a5568;
            /* Color de texto */
        }

        /* Estilos adicionales */
        .border-slate-500 {
            border-color: #718096;
            /* Color de borde */
        }

        .border-slate-600 {
            border-color: #4a5568;
            /* Color de borde */
        }

        .bg-gray-400 {
            background-color: #cbd5e0;
            /* Color de fondo */
        }

        .text-center {
            text-align: center;
            /* Alineación de texto */
        }

        .font-bold {
            font-weight: bold;
            /* Peso de la fuente */
        }

        .text-lg {
            font-size: 1.125rem;
            /* Tamaño de fuente */
        }

        .uppercase {
            text-transform: uppercase;
            /* Transformación de texto a mayúsculas */
        }

        .font-thin {
            font-weight: 100;
            /* Peso de la fuente */
        }

        .text-sm {
            font-size: 0.875rem;
            /* Tamaño de fuente */
        }
    </style>
</head>

<body>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-8 py-2">
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Datos del Documento: <span
                    class="uppercase">{{ $documento->tipo_documento->name }}</span></h2>
            <div class="mt-8 grid grid-cols-1 gap-x-2 gap-y-2 md:grid-cols-3">

                <!-- INICIO - VISTA PREVIA REMISIÓN -->

                <div class="sm:col-span-3 border px-3 py-2">
                    <div class="mt-2 mx-24">
                        <img src="{{ asset('img/logo-arsite.png') }}" alt="Logo" width="500px" class="my-7">
                        {{-- Muestra la fecha del documento en el siguiente formato:  XX (dia) de XX (mes) 20XX --}}
                        <p class="text-right">Villahermosa, Tabasco a
                            {{ \Carbon\Carbon::parse($documento->remision->fecha)->translatedFormat('d \d\e F \d\e Y') }}
                        </p>
                        <p class="font-semibold">{{ $documento->cliente->name }}</p>
                        <p class="font-semibold">{{ $documento->remision->empresa->name }}</p>
                        <h2 class="font-bold uppercase text-3xl text-center my-10">
                            {{ $documento->tipo_documento->name }} de Equipo</h2>
                        <table class="border-collapse border border-slate-500">
                            <thead class="text-center text-lg uppercase font-thin border border-slate-600 bg-gray-400">
                                <tr>
                                    <td class="border-collapse border border-slate- px-4 py-2">Cantidad</td>
                                    <td class="border-collapse border border-slate- px-4 py-2">Unidad</td>
                                    <td class="border-collapse border border-slate- px-4 py-2">Descripción</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documento->remision->detalles_remision as $detalle)
                                    <tr>
                                        <td class="border-collapse border border-slate- px-4 py-2 text-center">
                                            {{ $detalle->cantidad }}</td>
                                        <td class="border-collapse border border-slate- px-4 py-2 text-center">
                                            {{ $detalle->unidad }}</td>
                                        <td class="border-collapse border border-slate- px-4 py-2">
                                            {{ $detalle->descripcion }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <img src="{{ asset('img/remision/firmas_remision.jpg') }}" alt="Logo"
                            class="mx-auto object-cover rounded my-28">
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
        </div>

    </div>


</body>

</html>
