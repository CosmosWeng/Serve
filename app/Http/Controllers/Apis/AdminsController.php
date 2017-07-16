<?php
namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function restGet_admin($id)
    {
        var_dump('admin', $id);
    }
}
