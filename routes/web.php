<?php

use App\Http\Livewire\InicioDashboard;
use App\Http\Livewire\ShowEmpleados;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', InicioDashboard::class)->name('dashboard');

Route::get('dashboard/empleados', ShowEmpleados::class)->name('empleados');
