<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function index(Request $req)
    {
        $admins = $this->db::table('admins')
                      ->get();
        var_dump($admins);
        exit;
    }
}
