<?php

namespace App\Http\Livewire\Productos;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProductos extends Component
{
    use WithPagination;

    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';

    public $cant = '10';

    public $readyToLoad = false;

    protected $listeners = ['render', 'deleteProduct'];
    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'id'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => '']
    ];

    public function render()
    {
        if ($this->readyToLoad) {
            $productos = Producto::where('id', 'like', '%' . $this->search . '%')
                ->orWhere('nombre', 'like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        } else {
            $productos = [];
        }
        return view('livewire.productos.show-productos', compact('productos'));
    }

    public function loadPosts()
    {
        $this->readyToLoad = true;
    }


    public function order($sort)
    {
        if ($this->sort = $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
        }
    }

    public function deleteProduct(Producto $producto)
    {
        $producto->delete();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
