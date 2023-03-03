<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

     /**
     * @OA\Info(
     *      title="Подсистема 'Каршеринг'", version="3.0",
     *      @OA\Contact(
     *      email="carsh-app@example.com")
     * )
     * @OA\Server(
     *      url="http://192.168.0.35:80",
     *      description="API Server"
     * )
     */

class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
