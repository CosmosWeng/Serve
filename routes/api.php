<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware'=>'dynamic'], function () {
    if (isset($_SERVER['REQUEST_URI'])) {
        $request = explode('/', $_SERVER['REQUEST_URI']);
        $url = '/';
        $controller = 'Apis\\';
        $class = 'Controller';
        $req_method = 'rest' . ucfirst(strtolower($_SERVER['REQUEST_METHOD']));
        $method = $req_method;

        if (isset($request[2])) {
            $url .= $request[2];
            $class = ucfirst($request[2]). $class;
        }
        $controller .= $class.'@';

        if (isset($request[3])) {
            $url .= '/' .$request[3];
            $method .= '_'.$request[3];
        }

        if (isset($request[4])) {
            $url .= '/{id?}';
        }

        $namespace = 'App\Http\Controllers\Apis';
        if (class_exists($namespace.'\\'.$class)) {
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
