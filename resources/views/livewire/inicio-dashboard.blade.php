<div class="mt-5 p-3 rounded-md sm:flex md:flex-rows-3 lg:flex-rows-4 sm:flex-rows-2 flex flex-row items-center justify-center gap-3 space-y-1 md:space-y-0">
    <a href="{{ route('clientes.index') }}" class="inline-block text-center uppercase bg-orange-500 hover:bg-indigo-700 text-white font-bold py-2 rounded transition duration-300 ease-in-out transform hover:scale-105">
        <div class="flex flex-col items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>

            <footer class="bg-slate-50 w-full mt-2 p-2 transition duration-300 ease-in-out">
                <span class="text-gray-700 transition duration-300 ease-in-out hover:text-indigo-500"> {{$Cliente}} <br> Clientes </span>
            </footer>
        </div>
    </a>
    <a href="{{ route('usuarios.index') }}" class="inline-block text-center uppercase bg-orange-500 hover:bg-indigo-700 text-white font-bold py-2 rounded transition duration-300 ease-in-out transform hover:scale-105">
        <div class="flex flex-col items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
            </svg>

            <footer class="bg-slate-50 w-full mt-2 p-2  transition duration-300 ease-in-out ">
                <span class="text-gray-700 transition duration-300 ease-in-out hover:text-indigo-500"> {{$User}} <br> Usuarios </span>
            </footer>
        </div>
    </a>
    <a href="{{ route('documentos.index') }}" class="inline-block text-center uppercase bg-orange-500 hover:bg-indigo-700 text-white font-bold py-2 rounded transition duration-300 ease-in-out transform hover:scale-105">
        <div class="flex flex-col items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
            </svg>

            <footer class="bg-slate-50 w-full mt-2 p-2  transition duration-300 ease-in-out ">
                <span class="text-gray-700 transition duration-300 ease-in-out hover:text-indigo-500"> {{ $Documento }} <br> Documentos</span>
            </footer>
        </div>
    </a>

</div>