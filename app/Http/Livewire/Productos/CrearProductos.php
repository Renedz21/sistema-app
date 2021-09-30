<?php

namespace App\Http\Livewire\Productos;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearProductos extends Component
{

    use WithFileUploads;

    public $open = false;

    public $nombre, $precio, $stock, $descripcion, $imagen, $identificador;

    public function mount()
    {
        $this->identificador = rand();
    }

    protected $rules = [
        'nombre' => 'required',
        'precio' => 'required',
        'stock' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:2048',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $image = $this->imagen->store('images');

        Producto::create([
            'nombre' => $this->nombre,
            'precio' => $this->precio,
            'stock' => $this->stock,
            'descripcion' => $this->descripcion,
            'imagen' => $image
        ]);

        $this->reset([
            'open',
            'nombre',
            'precio',
            'stock',
            'descripcion',
            'imagen'
        ]);

        $this->identificador = rand();

        $this->emitTo('productos.show-productos', 'render');
        $this->emit('alert', 'El producto se creo satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.productos.crear-productos');
    }
}
