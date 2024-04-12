<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remision</title>
    @vite(['resources/css/app.css'])

</head>

<body>

    <div class="pb-12">
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
                    {{-- <img src="{{ asset('img/remision/firmas_remision.jpg') }}" alt="Logo"
                            class="mx-auto object-cover rounded my-28"> --}}
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

        </div>
    </div>


</body>

</html>
