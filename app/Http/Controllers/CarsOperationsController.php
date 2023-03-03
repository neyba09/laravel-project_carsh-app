<?php

namespace App\Http\Controllers;

use App\Models\Cars_operations;
use App\Models\CarsController;
use App\Models\Cars_models;
use App\Models\Cars_mark;
use App\Models\Cars;

use Illuminate\Http\Request;

class CarsOperationsController extends Controller
{
   public function index() {
        $carsOperations = Cars_operations::find(1)->cars->cars_models->car_mark()->first()->car_mark;
        dump($carsOperations);
   }
}
