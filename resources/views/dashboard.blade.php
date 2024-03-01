    <!-- Titulo de la página con el @ yield()  -->
    @section('titulo')
    Dashboard
    @endsection
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Sistema de Gestión Documental - AR-SITE INTEGRADORES S.A DE C.V') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- Para agregar un componente. simplemente creadno --}}    
                <livewire:inicio-dashboard />

                </div>
            </div>
        </div>
    </x-app-layout>