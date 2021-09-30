<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Empleado;

class CrearEmpleados extends Component
{
    public $open = false;

    public $nombre, $edad;
    // // $identificador;

    // public function mount()
    // {
    //     // $this->identificador = rand();
    // }

    protected $rules = [
        'nombre' => 'required',
        'edad' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        // $image = $this->imagen->store('images');

        Empleado::create([
            'nombre' => $this->nombre,
            'edad' => $this->edad,
            // 'imagen' => $image
        ]);

        $this->reset([
            'open',
            'nombre',
            'edad',
            // 'imagen'
        ]);

        //$this->identificador = rand();

        $this->emitTo('show-empleados', 'render');
        $this->emit('alert', 'El empleado se registro satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.crear-empleados');
    }
}
