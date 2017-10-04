<?php
/**
 * Created by PhpStorm.
 * User: arnold.mercado
 * Date: 10/3/2017
 * Time: 9:49 PM
 */

namespace App\Traits;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



trait ApiLoginTraits
{
    use IssueTokenTraits;


    public function apiLogin(Request $request) {

        $user = $this->validateLogin($request);

        return $this->issueToken($this->clientId,$request,$user,'password');

    }

    public function refresh(Request $request) {

        $this->validate($request,[
            'refresh_token' =>  'required'
        ]);

        $user = [
            "user_name" =>  $request->input('email'),
            "password"  =>  $request->input('password')
        ];

        return $this->issueToken(1,$request,$user,'refresh_token');

    }

    public function apiLogout() {

        $accessToken = Auth::user()->token();

        \DB::table('oauth_refresh_tokens')
            ->where('access_token_id',$accessToken->id)
            ->update(['revoked' => true]);

        $accessToken->revoke();

        return response()->json([],204);
    }


}