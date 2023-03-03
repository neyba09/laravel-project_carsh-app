<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cars;
use App\Http\Resources\Cars as ResourcesCars;
use App\Http\Requests\CarsStoreRequest;


class CarsController extends Controller
{

    public function index() {
        $cars = Cars::find(1)->cars_status->car_status;
        return $cars;
    }

    public function store (CarsStoreRequest $request) {
        $cars = Cars::create($request->validated());
        return new ResourcesCars ($cars);
    }

    public function test(Request $request) {
        return csrf_token();
    }
}
