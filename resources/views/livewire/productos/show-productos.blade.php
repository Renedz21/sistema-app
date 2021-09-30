<x-dashboard>
    <div wire:init="loadPosts">
        <x-table>
            <div class="px-6 py-4 flex items-center">
                <div class="flex items-center">
                    <span>Mostrar</span>
                    <select wire:model="cant" class="mx-2 border border-gray-300 rounded-lg">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>

                    <span class="flex">entradas</span>
                </div>
                <x-jet-input type="text" class="flex-1 mx-4" placeholder="Buscar..." wire:model="search" />
                @livewire('productos.crear-productos')
            </div>


            @if (count($productos))
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 cursor-pointer text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('id')">
                                ID
                                @if ($sort == 'id')

                                    @if ($direction == 'asc')
                                        <i class='bx bx-sort-a-z float-right mt-1'></i>
                                    @else
                                        <i class='bx bx-sort-z-a float-right mt-1'></i>
                                    @endif

                                @else
                                    <i class='bx bxs-sort-alt float-right mt-1'></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="px-6 py-3 cursor-pointer text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('nombre')">
                                NOMBRE
                                @if ($sort == 'nombre')

                                    @if ($direction == 'asc')
                                        <i class='bx bx-sort-a-z float-right mt-1'></i>
                                    @else
                                        <i class='bx bx-sort-z-a float-right mt-1'></i>
                                    @endif

                                @else
                                    <i class='bx bxs-sort-alt float-right mt-1'></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                PRECIO
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                STOCK
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                DESCRIPCION
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Accion
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($productos as $item)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $item->id }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $item->nombre }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->precio }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->stock }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->descripcion }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->imagen }}
                                </td>
                                <td class="px-1 py-4 flex">
                                    @livewire('productos.editar-productos', ['producto' => $item], key($item->id))
                                    <a class="font-bold flex ml-2 text-white py-2 px-4 bg-red-600 rounded cursor-pointer hover:bg-red-500"
                                        wire:click="$emit('deleteId', {{ $item->id }})">
                                        <i class='bx bxs-trash'></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if ($productos->hasPages())
                    <div class="px-6 py-3">
                        {{ $productos->links() }}
                    </div>
                @endif
            @else
                <div class="w-full text-white bg-red-500">
                    <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                        <div class="flex">
                            <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                                <path
                                    d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z">
                                </path>
                            </svg>

                            <p class="mx-3">No existe el producto...</p>
                        </div>
                    </div>
                </div>
            @endif

        </x-table>
    </div>

    @push('js')
        <script src="sweetalert2.all.min.js"></script>
        <script>
            Livewire.on('deleteId', itemId => {
                Swal.fire({
                    title: 'Estas seguro?',
                    text: "Esta opcion es irreversible!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('productos.show-productos', 'deleteProduct', itemId);
                        Swal.fire(
                            'Eliminado!',
                            'El producto ha sido eliminado.',
                            'success'
                        )

                    }
                })
            })
        </script>
    @endpush
</x-dashboard>
