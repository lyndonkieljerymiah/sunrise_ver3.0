<?php

namespace App\Http\Controllers\Api\Auth;

use App\Facades\Result;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{

    private $role;
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function create(Request $request) {

        $this->validate($request,[
            "name"          =>  "required|string",
            "description"   =>  "required"
        ]);


        $role = Role::create(["name" => $request->input("name"),"description" => $request->input("description")]);

        Result::ok("Role successfully created",$role);

    }
}
