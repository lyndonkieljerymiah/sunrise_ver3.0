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

use App\Facades\Result;
use Mockery\Exception;

trait ApiRegisterTraits
{

    public function register(Request $request) {

        $this->validate($request, [
            "full_name"     =>  'required',
            "user_name"     =>  'required|max:20',
            "email"         =>  'required|email|unique:users',
            "password"      =>  'required|confirmed'
        ]);

        $user = $this->store($request->all());
            
        event(new Registered($user));
        
        return response()->json(["isOk" => true,"message" => "Successfully Registered",$user]);
    }

    public function update($id,Request $request) {


        $request->request->add(['id' => $id]);

        $this->validate($request, [
            "id"            =>  'required|integer',
            "full_name"     =>  'required',
            "user_name"     =>  'required|max:20',
            "email"         =>  'required|email',
        ]);

        $user = $this->store($request->all());

        event(new Registered($user));
        
        return response()->json(["isOk" => true,"message" => "Successfully Registered",$user]);

    }

    public function edit($id) {
        try {
            $user = $this->user->with('roles')->where('id',$id)->get();
            if($user->count() <= 0) {
                throw new Exception("Unknown User");
            }
            return $user;
        }
        catch(Exception $e) {
            return Result::badRequest(["message" => $e->getMessage()]);
        }

        
    }

    





}