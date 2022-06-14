<?php

namespace App\Http\Controllers;

use App\Actions\Calculate;
use App\Http\Requests\CalculateRequest;
use Illuminate\Http\Request;

class CalculateController extends Controller
{
    public function __invoke(CalculateRequest $request)
    {
        $data = $request->validated();

        $caluculate = (new Calculate())($data);

        return response()->json(['data' => $caluculate]);
    }
}
