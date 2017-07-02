<?php
namespace App\Providers;

use Illuminate\Support\Facades\Route;

class DynamicRoute extends Route
{
    protected function dynamic($class = null)
    {
        return 'Controller@method';
    }
}
