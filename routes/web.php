<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\branchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LockerController;
use App\Http\Controllers\HistoryController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::redirect('/', '/login');

/* Route::get('/dashboard', function () {
    return view('dashboard'); 
})->middleware(['auth', 'verified'])->name('dashboard'); */

  Route::get('/dashboard', [LockerController::class, 'index'])->middleware(['auth'])->name('dashboard');  
 
require __DIR__.'/auth.php';

Route::controller(ClientController::class)->group(function(){
    //Route::post('/sgcc/client/destroy1','destroy1')->name('client.destroy1');
    Route::post('/sgcc/client/senddat','senddat')->name('client.senddat');

    Route::get('/sgcc/client/prueba','mostrar')->name('client.prueba');

    Route::get('/sgcc/client/create','create')->name('client.create');
    Route::post('/sgcc/client/store','store')->name('client.store');
    Route::get('/sgcc/client/index','index')->name('client.index');

    Route::get('/sgcc/client/{client}/edit', 'edit')->name('client.edit');
    Route::put('/sgcc/client/{client}/update', 'update')->name('client.update');

    Route::get('/sgcc/client/{client}/show','show')->name('client.show');
    Route::delete('/sgcc/client/{client}/destroy','destroy')->name('client.destroy');
    Route::post('/sgcc/client/destroyindex','destroyindex')->name('client.destroyindex');

    /* Ejemplo AJAX */
    Route::get('/sgcc/client/getData','getData')->name('client.getData');
    Route::get('/sgcc/client/{id}/getDataPro','getDataPro')->name('client.getDataPro');

    


});

Route::controller(SupplierController::class)->group(function(){
    Route::get('/sgcc/supplier/prueba','mostrar')->name('supplier.prueba');

    Route::get('/sgcc/supplier/create','create')->name('supplier.create');
    Route::post('/sgcc/supplier/store','store')->name('supplier.store');
    Route::get('/sgcc/supplier/index','index')->name('supplier.index');

    Route::get('/sgcc/supplier/{supplier}/edit', 'edit')->name('supplier.edit');
    Route::put('/sgcc/supplier/{supplier}/update', 'update')->name('supplier.update');

    Route::get('/sgcc/supplier/{supplier}/show','show')->name('supplier.show');
    Route::delete('/sgcc/supplier/{supplier}/destroy','destroy')->name('supplier.destroy');
    Route::post('/sgcc/supplier/destroyindex','destroyindex')->name('supplier.destroyindex');

});

Route::controller(CategoryController::class)->group(function(){
    Route::get('/sgcc/category/prueba','mostrar')->name('category.prueba');

    Route::get('/sgcc/category/create','create')->name('category.create');
    Route::post('/sgcc/category/store','store')->name('category.store');
    Route::get('/sgcc/category/index','index')->name('category.index');

    Route::get('/sgcc/category/{category}/edit', 'edit')->name('category.edit');
    Route::put('/sgcc/category/{category}/update', 'update')->name('category.update');

    Route::get('/sgcc/category/{category}/show','show')->name('category.show');
    Route::delete('/sgcc/category/{category}/destroy','destroy')->name('category.destroy');
    Route::post('/sgcc/category/destroyindex','destroyindex')->name('category.destroyindex');
});

Route::controller(BranchController::class)->group(function(){
    Route::get('/sgcc/branch/prueba','mostrar')->name('branch.prueba');

    Route::get('/sgcc/branch/create','create')->name('branch.create');
    Route::post('/sgcc/branch/store','store')->name('branch.store');
    Route::get('/sgcc/branch/index','index')->name('branch.index');

    Route::get('/sgcc/branch/{branch}/edit', 'edit')->name('branch.edit');
    Route::put('/sgcc/branch/{branch}/update', 'update')->name('branch.update');

    Route::get('/sgcc/branch/{branch}/show','show')->name('branch.show');
    Route::delete('/sgcc/branch/{branch}/destroy','destroy')->name('branch.destroy');
    Route::post('/sgcc/branch/destroyindex','destroyindex')->name('branch.destroyindex');

});

Route::controller(ProductController::class)->group(function(){
    Route::get('/sgcc/product/prueba','mostrar')->name('product.prueba');

    Route::get('/sgcc/product/create','create')->name('product.create');
    Route::post('/sgcc/product/store','store')->name('product.store');
    Route::get('/sgcc/product/index','index')->name('product.index');

    Route::get('/sgcc/product/{product}/edit', 'edit')->name('product.edit');
    Route::put('/sgcc/product/{product}/update', 'update')->name('product.update');

    Route::get('/sgcc/product/{product}/show','show')->name('product.show');
    Route::delete('/sgcc/product/{product}/destroy','destroy')->name('product.destroy');
    Route::post('/sgcc/product/destroyindex','destroyindex')->name('product.destroyindex');


});

Route::controller(LockerController::class)->group(function(){
    

    Route::get('/sgcc/locker/index','index')->name('locker.index');
    Route::put('/sgcc/locker/update','update')->name('locker.update');
    Route::post('/sgcc/locker/clear','clear')->name('locker.clear');
    Route::post('/sgcc/locker/create','create')->name('locker.create');
    //Route::get('/sgcc/locker/index','index')->name('lockercontrol.show');

    //AJAX
    Route::get('/sgcc/locker/statusLockers','statusLockers')->name('locker.statusLockers');
    Route::post('/sgcc/locker/saveLocker','saveLocker')->name('locker.saveLocker');
    

});

Route::controller(HistoryController::class)->group(function(){
    Route::get('/sgcc/locker/history','index')->name('history.index');
});


/* 
    1. comentamos el layouts/app.blade la linea @include('layouts.sidebar')
    2. comentamos la ruta del dashboard por defecto
*/
 