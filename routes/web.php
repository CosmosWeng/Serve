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
Route::get('/', function () {
    return View('welcome');
});

Route::group([], function () {
    if (isset($_SERVER['REQUEST_URI'])) {
        $request = explode('/', parse_url($_SERVER['REQUEST_URI'])['path']);
        $url = '';
        foreach ($request as $key => $value) {
            if ($key == 1) {
                continue;
            }
            $url .= '/{key'. $key . '}';
        }

        Route::get($url, function () {
            $keys = func_get_args();
            $index = 1;
            $url = '';
            foreach ($keys as $k =>$value) {
                if (preg_match('/^([0-9]+)$/', $value)) {
                    $data['id'.$index] = $value;
                    $index += 1;
                } else {
                    $url .= '.' .$value;
                    $data[$value] = $value;
                }
            }
            $url = ltrim($url, '.');
            if (view()->exists($url)) {
                return view($url, $data);
            }
            return view('errors.404');
        });
    }
});
