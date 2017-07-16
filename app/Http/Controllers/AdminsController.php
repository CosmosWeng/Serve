<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function index(Request $req)
    {
        var_dump($req);
    }
}
