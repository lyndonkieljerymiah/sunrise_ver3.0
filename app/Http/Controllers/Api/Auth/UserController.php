<?php

namespace App\Http\Controllers\Api\Auth;

use App\Facades\Result;
use App\Traits\ApiRegisterTraits;
use App\Models\User;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    use ApiRegisterTraits;

    protected $user;

    protected $redirectPath = "/";

    public function __construct()
    {
        $this->user = new User();
    }

    public function index() {

        return $this->user->users_with_roles;

    }

    protected function store($data)
    {
        try {

            if (isset($data['id']) && $data['id'] != 0) {
                $user = $this->user->find($data['id']);

                if (!$user)
                    throw new Exception("Unknown User");

                $user->register($data);

            }
            else {
                $user = $this->user->register($data);
            }

            return $user;
        }
        catch(Exception $e) {
            return Result::badRequest(["message" => $e->getMessage()]);
        }
    }
}
