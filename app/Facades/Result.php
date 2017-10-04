<?php
/**
 * Created by PhpStorm.
 * User: arnold.mercado
 * Date: 10/4/2017
 * Time: 12:08 PM
 */

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Result extends  Facade
{
    protected static function getFacadeAccessor()
    {
        return 'result';
    }

}