<?php

namespace App\Http\Livewire\Productos;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditarProductos extends Component
{
    use WithFileUploads;

    public $open = false;
    public $producto, $imagen, $identificador;

    // protected $rules = [
    //     'post.nombre' => 'required',
    //     'post.edad' => 'required',
    // ];

    protected $rules = [
        'producto.nombre' => 'required',
        'producto.precio' => 'required',
        'producto.stock' => 'required',
        'producto.descripcion' => 'required',
        'producto.imagen' => 'required|image|max:2048',
    ];

    public function mount(Producto $producto)
    {
        $this->producto = $producto;
        $this->identificador = rand();
    }

    public function save()
    {

        $this->validate();

        if ($this->imagen) {
            Storage::delete([$this->producto->imagen]);

            $this->producto->imagen = $this->imagen->store('images');
        }

        $this->producto->save();

        $this->reset([
            'open',
            'imagen'
        ]);

        $this->identificador = rand();

        $this->emitTo('productos.show-productos', 'render');

        $this->emit('alert', 'El producto se edito satisfactoriamente');
    }
    public function render()
    {
        return view('livewire.productos.editar-productos');
    }
}
