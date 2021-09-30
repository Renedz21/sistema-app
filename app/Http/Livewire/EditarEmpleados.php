<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Empleado;

class EditarEmpleados extends Component
{
    public $open = false;
    public $empleado;

    protected $rules = [
        'empleado.nombre' => 'required',
        'empleado.edad' => 'required',
    ];

    public function mount(Empleado $empleado)
    {
        $this->empleado = $empleado;
    }

    public function save()
    {

        $this->validate();
        $this->empleado->save();

        $this->reset([
            'open'
        ]);

        $this->emitTo('show-empleados', 'render');

        $this->emit('alert', 'El empleado se edito satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.editar-empleados');
    }
}
