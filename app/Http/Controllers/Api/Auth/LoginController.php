<?php

namespace App\Http\Controllers\Api\Auth;

use App\Traits\ApiLoginTraits;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{
    use ApiLoginTraits;

    protected  $username = "user_name";

    protected $clientId = 1;



}
