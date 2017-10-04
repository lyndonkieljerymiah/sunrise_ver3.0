<?php

namespace App\Http\Controllers\Api\Auth;

use App\Traits\ApiRegisterTraits;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Client;

class RegisterController extends Controller
{
    use ApiRegisterTraits;

    private $user;

    protected $redirectPath = "/";

    public function __construct() {

        $this->user = new User();

    }

    protected function create($data) {

        return $user = $this->user->register($data);
        
    }






}
