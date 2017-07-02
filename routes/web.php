<?php

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
Route::get('/', 'Controller@method');


Route::get('{class}/{method?}/{id?}', function ($classname, $method = null, $id=null) {
    //var_dump($this->current());
    $class = ucfirst($classname).'Controller';
    $namespace = $this->current()->action['namespace'].'\\'.$class;
    //var_dump(class_exists($namespace.'\\'.$class.'Controller'));
    // if (class_exists($namespace)) {
    //     $controller = new $namespace();
    //     if (!$method) {
    //         $method = 'method';
    //     }
    //     return $controller->$method();
    // }
    //  return view('welcome');
    return (string)'Controller@method';
});
