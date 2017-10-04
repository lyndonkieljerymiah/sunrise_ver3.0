<?php
/**
 * Created by PhpStorm.
 * User: arnold.mercado
 * Date: 10/3/2017
 * Time: 7:51 PM
 */

namespace App\Traits;


use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Facades\Result;

trait ApiRegisterTraits
{

    public function register(Request $request) {

        $this->validate($request, [
            "full_name"     =>  'required',
            "user_name"     =>  'required|max:20',
            "email"         =>  'required|email|unique:users',
            "password"      =>  'required|confirmed'
        ]);

        $user = $this->create($request->all());
        
        event(new Registered($user));
        
        return response()->json(["isOk" => true,"message" => "Successfully Registered",$user]);
    }

    





}