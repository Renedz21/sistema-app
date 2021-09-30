<?php

use App\Http\Livewire\Cliente\ShowCliente;
use App\Http\Livewire\InicioDashboard;
use App\Http\Livewire\Productos\ShowProductos;
use App\Http\Livewire\ShowEmpleados;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', InicioDashboard::class)->name('dashboard');

Route::get('dashboard/empleados', ShowEmpleados::class)->name('empleados');

Route::get('dashboard/clientes', ShowCliente::class)->name('clientes');

Route::get('dashboard/productos', ShowProductos::class)->name('productos');
