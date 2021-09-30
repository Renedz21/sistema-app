<div>
    <x-jet-danger-button wire:click="$set('open', true)">
        Agregar
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model='open'>
        <x-slot name="title">
            Agregar un nuevo Empleado
        </x-slot>
        <x-slot name="content">

            {{-- <div wire:loading wire:target="imagen"
                class="flex w-full max-w-sm mx-auto overflow-hidden bg-indigo-500 rounded-lg shadow-md mb-4 dark:bg-gray-800">
                <div class="px-4 py-2 -mx-3">
                    <div class="mx-3">
                        <span class="font-semibold text-white dark:text-green-400">¡Cargando Imagen...!</span>
                    </div>
                </div>
            </div> --}}

            {{-- @if ($imagen)
                <img class="mb-4" src="{{ $imagen->temporaryUrl() }}" alt="">
            @endif --}}

            <div class="mb-4">
                <x-jet-label value="Ingrese su nombre" class="mb-2" />
                <x-jet-input type="text" {{-- id="editor" --}} class="w-full" wire:model='nombre' />
                <x-jet-input-error for="nombre" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Ingrese su edad" class="mb-2" />
                <x-jet-input type="number" class="w-full" wire:model='edad' />
                <x-jet-input-error for="edad" />
            </div>
            <!-- <div class="mb-4">
                <x-jet-input type="file" class="w-full" wire:model='imagen' {{-- id="{{ $identificador }}" --}} />
                <x-jet-input-error for="imagen" />
            </div>-->
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, imagen"
                class="disabled:opacity-25">
                Agregar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- @push('js')
        <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>

        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
        </script>

    @endpush --}}

</div>
