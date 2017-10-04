<?php

namespace App\Http\Controllers\Api;

use App\Models\Villa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VillaController extends Controller
{

    private $model;

    public function __construct(Villa $villa)
    {
        $this->model = $villa;
    }

    public function search(Request $request) {

        $status = $request->input('status','active');

        $villa = $this->model->getByStatus($status);

        return response()->json(["data" => $villa]);
    }
}
