<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Empleado;
use Livewire\WithPagination;

class ShowEmpleados extends Component
{

    use WithPagination;

    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';

    public $cant = '10';


    protected $listeners = ['render', 'delete'];
    public $readyToLoad = false;



    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'id'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => '']
    ];

    public function render()
    {
        if ($this->readyToLoad) {
            $empleado = Empleado::where('nombre', 'like', '%' . $this->search . '%')
                ->orWhere('edad', 'like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        } else {
            $empleado = [];
        }

        return view('livewire.show-empleados', compact('empleado'));
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

    public function delete(Empleado $empleado)
    {
        $empleado->delete();
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }
}
