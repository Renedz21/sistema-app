<div>
    <a class="font-bold flex  text-white py-2 px-4 bg-green-600 rounded cursor-pointer hover:bg-green-500 "
        wire:click="$set('open',true)">
        <i class='bx bxs-edit'></i>
    </a>

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Editar Producto {{ $producto->nombre }}
        </x-slot>

        <x-slot name="content">

            <div wire:loading wire:target="imagen"
                class="flex w-full max-w-sm mx-auto overflow-hidden bg-indigo-500 rounded-lg shadow-md mb-4 dark:bg-gray-800">
                <div class="px-4 py-2 -mx-3">
                    <div class="mx-3">
                        <span class="font-semibold text-white dark:text-green-400">¡Cargando Imagen...!</span>
                    </div>
                </div>
            </div>

            @if ($imagen)
                <img class="mb-4" src="{{ $imagen->temporaryUrl() }}" alt="">
            @else
                <img class="mb-4" src="{{ Storage::url('app/' . $producto->imagen) }}" alt="">
            @endif

            <div class="mb-4">
                <x-jet-label value="Nombre del producto" class="mb-2" />
                <x-jet-input wire:model="producto.nombre" type="text" class="w-full" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Precio del producto" class="mb-2" />
                <x-jet-input wire:model="producto.precio" type="number" class="w-full" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Stock del producto" class="mb-2" />
                <x-jet-input wire:model="producto.stock" type="number" class="w-full" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Descripcion del producto" class="mb-2" />
                <x-jet-input wire:model="producto.descripcion" type="text" class="w-full" />
            </div>
            <div class="mb-4">
                <x-jet-input type="file" class="w-full" wire:model='producto.imagen'
                    id="{{ $identificador }}" />
                <x-jet-input-error for="imagen" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
