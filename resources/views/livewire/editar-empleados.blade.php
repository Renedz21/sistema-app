<div>
    <a class="font-bold flex  text-white py-2 px-4 bg-green-600 rounded cursor-pointer hover:bg-green-500 "
        wire:click="$set('open',true)">
        <i class='bx bxs-edit'></i>
    </a>


    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Editar Empleado {{ $empleado->nombre }}
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Nombre del empleado" class="mb-2" />
                <x-jet-input wire:model="empleado.nombre" type="text" class="w-full" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Edad del empleado" class="mb-2" />
                <x-jet-input wire:model="empleado.edad" type="number" class="w-full" />
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
