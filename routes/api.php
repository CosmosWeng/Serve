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

// 以 Contollers 為根目錄, 第一個 segment 為 目錄, 第二個 為 class, 第三個 為 function
Route::group(['middleware'=>'dynamic'], function () {
    if (isset($_SERVER['REQUEST_URI'])) {
        $request    = array_slice(explode('/', parse_url($_SERVER['REQUEST_URI'])['path']), 2) ;
        $url        = '';
        $controller = '';
        $control    = false;
        $rest       = 'rest';
        $Bulk       = 'Bulk';
        $method     = ucfirst(strtolower($_SERVER['REQUEST_METHOD']));
        $basefun    = '';
        $func       = '';
        $index = 1;
        foreach ($request as $key => $value) {
            if (file_exists(app_path('Http/Controllers/').ucfirst($value))) {
                // 為目錄
                $controller = ucfirst($value).'\\';
                $url = $value .'/';
            } elseif (file_exists(app_path('Http/Controllers/').ucfirst($url).ucfirst($value).'Controller.php')) {
                // 檔案
                $controller .= ucfirst($value) . 'Controller';
                $url .= $value ;
                $class = 'App\Http\Controllers\\'. $controller;
                if (class_exists($class)) {
                    $control = new $class;
                }
            } elseif (preg_match('/^([0-9]+)$/', $value)) {
                $url .= '/{arg'.$index.'?}';
                $index   = $index + 1;
                $basefun = $rest . $method;
                $func    = $basefun;
            } else {
                $url .= '/' . $value;
                $basefun = $rest .$Bulk. $method;
                $func    = $basefun .'_'. $value;
            }
            if (method_exists($control, $func)) {
                $func = $controller . '@' . $func;
            } else {
                $func = $controller . '@' . $basefun;
            }
        }
        Route::get($url, $func);
        Route::post($url, $func);
        Route::put($url, $func);
        Route::delete($url, $func);
    }
});
