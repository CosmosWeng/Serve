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
        $request = explode('/', parse_url($_SERVER['REQUEST_URI'])['path']);
        $url = '';
        $controller = 'Apis\\';
        $class = 'Controller';
        $rest = 'rest';
        $Bulk = 'Bulk';
        $method = $rest.$Bulk;
        $func = '';

        foreach ($request as $key => $value) {
            if ($key == 1 || $key == 0) {
                continue;
            }
            if ($key == 2) {
                $url .= $request[2];
                $class = ucfirst($value). $class;
                continue;
            }

            if (preg_match('/^([0-9]+)$/', $value)) {
                $url .= '/{id?}';
                $method = $rest;
            } else {
                $url .= '/' . $value;
                $method = $rest . $Bulk;
                $func .= '_' . $value;
            }
        }
        $controller .= $class.'@';
        $namespace = 'App\Http\Controllers\Apis';
        if (class_exists($namespace.'\\'.$class)) {
            $control =  $namespace.'\\'.$class;
            $control = new $control;
            $method =  $method . ucfirst(strtolower($_SERVER['REQUEST_METHOD']));
            $func = $method .$func ;
            if (method_exists($control, $func)) {
                $controller .= $func;
            } else {
                $controller .= $method;
            }
            // var_dump($url, $controller);
            // exit;
            Route::get($url, $controller);
            Route::post($url, $controller);
            Route::put($url, $controller);
            Route::delete($url, $controller);
        }
    }
});
