<?php
/**
 * Created by PhpStorm.
 * User: arnold.mercado
 * Date: 10/4/2017
 * Time: 12:05 PM
 */

namespace App\Helpers;


class Result
{
    public static function ok($message = '',$data = []) {
        return [
            'isOk'      => true,
            'message'   => $message,
            'data'      =>  $data
        ];
    }

    public static function badRequest($errors = array()) {

        return response()->json($errors,500);

    }

    public static function loginFailed($errors) {

        return response()->json($errors,422);
    }

    public static function badRequestWeb($exception) {

        return Response::view('errors.500',compact('exception'))->header('Content-Type', "text/html");

    }
}