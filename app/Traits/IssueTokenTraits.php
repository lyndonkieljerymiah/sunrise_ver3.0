<?php
/**
 * Created by PhpStorm.
 * User: arnold.mercado
 * Date: 10/3/2017
 * Time: 8:00 PM
 */

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Client;

trait IssueTokenTraits
{


    public function issueToken($clientId,$request, $user,$grant_type = 'password',$scope = '*')
    {
        $client = Client::find($clientId);
        
        $params = [
            'grant_type' => $grant_type,
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'username' => $user['username'],
            'password' => $user['password'],
            'scope' => $scope,
        ];

        $request->request->add($params);
        $proxy = Request::create("oauth/token", "POST");

        return Route::dispatch($proxy);
    }

    public function requestPasswordToken($clientId, array $user, Request $request)
    {

        $client = Client::find($clientId);

        $params = [
            'grant_type' => 'password',
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'username' => $user['username'],
            'password' => $user['password'],
            'scope' => '*',
        ];

        $request->request->add($params);
        $proxy = Request::create("oauth/token", "POST");

        return Route::dispatch($proxy);
    }
    

    public function requestRefreshToken($clientD, array $user, Request $request)
    {
    }
}
