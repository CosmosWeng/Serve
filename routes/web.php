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
//Route::get('/', 'Controller@method');

Route::group(['middleware'=>'dynamic'], function () {
    if (isset($_SERVER['REQUEST_URI'])) {
        $request = explode('/', $_SERVER['REQUEST_URI']);
        $url = '/';
        $namespace = 'App\Http\Controllers';
        $class = 'Controller';
        $req_method = 'rest' . ucfirst(strtolower($_SERVER['REQUEST_METHOD']));
        $method = $req_method;

        if (isset($request[1])) {
            $url .= $request[1];
            $class = ucfirst($request[1]).'Controller';
            $controller = $class.'@';
        }

        if (isset($request[2])) {
            $url .= '/' .$request[2];
            $method .= '_'.$request[2];
        }

        if (isset($request[3])) {
            $url .= '/{id?}';
        }
        if (class_exists($namespace.'\\'.$class)) {
            $controller = 'Controller@';
            $control =  $namespace.'\\'.$class;
            $control = new $control;
            if (method_exists($control, $method)) {
                $controller .= $method;
            } else {
                $controller .= $req_method;
            }
            Route::get($url, $controller);
            Route::post($url, $controller);
            Route::put($url, $controller);
            Route::delete($url, $controller);
        }
    }
});
