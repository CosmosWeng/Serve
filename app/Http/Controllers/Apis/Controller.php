<?php

namespace App\Http\Controllers\Apis;

use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

// use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Foundation\Validation\ValidatesRequests;
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Admins as admins;

class Controller extends BaseController
{
    public function restGet(Request $request, $id)
    {
        $uri = $request->path();
        $segments = explode('/', $uri);
        $tbl = $segments[1];
        $http_status_code = 200;
        $data = DB::table($tbl)->where('id', '=', $id)->get();
        if ($data->isEmpty()) {
            $http_status_code = 404;
        }
        return response()->json($data, $http_status_code);
    }

    public function restBulkGet(Request $request)
    {
        $uri = $request->path();
        $segments = explode('/', $uri);
        $tbl = $segments[1];

        //$data = admins::all()->toArray();
        //$data = ucfirst($model)::all()->toArray();
        $http_status_code = 200;
        $data = DB::table($tbl)->get();
        if ($data->isEmpty()) {
            $http_status_code = 404;
        }
        return response()->json($data, $http_status_code);
    }
}
