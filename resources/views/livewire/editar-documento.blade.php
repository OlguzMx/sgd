<div>
    <form wire:submit="editarDocumento">
        <div class="gap-y-4 sm:gap-x-6 sm:gap-y-4">
            <div class="space-y-4">
                <h3>Documento: {{ $documento->tipo_documento->name }}</h3>
                <div>
                    <label for="users_id" class="block text-sm font-medium leading-6 text-gray-900">Usuario</label>
                    <select id="users_id" wire:model="users_id"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="{{ $documento->user->id }}">{{ $documento->user->name }}</option>
                    </select>
                </div>

                <div>
                    <label for="clientes_id" class="block text-sm font-medium leading-6 text-gray-900">Cliente</label>
                    <select id="clientes_id" wire:model="clientes_id"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Seleccione el Cliente</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                        @endforeach
                    </select>
                    @error('clientes_id')
                        <div
                            class="alerta my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                            <p class="text-red-700">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
            </div>

            <button 
                type="submit">
                Editar
            </button>

    </form>



    <div class="pt-4">
        <button
            class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-2 rounded transition duration-300 ease-in-out transform hover:scale-105"><a
                href="{{ route('documentos.index') }}">Regresar</a></button>
    </div>
</div>
