<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cars;
use App\Http\Resources\Cars as ResourcesCars;
use App\Http\Requests\CarsStoreRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
     *     path="/api/cars",
     *     tags={"Машины"},
     *     summary="Вернуть полный список с информацией по машинам",
     *     operationId="/api/cars(GET)",
     *     @OA\Response(
     *         response="200",
     *         description="Возвращает полный список с информацией по машинам"
     *         )
     *  )
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cache = Cache::get(Route::current()->uri);

        if($cache) {
            return $cache;
        }

        $cache = ResourcesCars::collection(Cars::all());
        Cache::put(Route::current()->uri, $cache, now()->addMinutes(300));
        return $cache;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @OA\Post(
     *     path="/api/cars",
     *     tags={"Машины"},
     *     summary="Добавить новое поле с информацией по машине",
     *     operationId="/api/cars(POST)",
     *     @OA\Response(
     *         response="200",
     *         description="Добавляет новое поле с информацией по машине"
     *     ),
     *      @OA\RequestBody(
     *        required=true,
     *           @OA\JsonContent(ref="#/components/schemas/CarsStoreRequest")
     *      )
     * )
     *
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarsStoreRequest $request)
    {
        $cars = Cars::create($request->validated());
        return new ResourcesCars($cars);
    }

    /**
     * Display the specified resource.
     *
     *  @OA\Get(
     *     path="/api/cars/23",
     *     tags={"Машины"},
     *     summary="Вернуть поле с информацией по конкретной машине",
     *     operationId="/api/cars/{cars}(GET)",
     *     @OA\Response(
     *         response="200",
     *         description="Возвращает поле с информацией по конкретной машине"
     *     )
     * )
     * 
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cars $car)
    {
        $cache = Cache::get(Route::current()->uri);

        if($cache) {
            return $cache;
        }

        $cache = new ResourcesCars($car);
        Cache::put(Route::current()->uri, $cache, now()->addMinutes(300));
        return $cache;
    }

    /**
     * Update the specified resource in storage.
     *
     * @OA\Put(
     *     path="/api/cars/22",
     *     tags={"Машины"},
     *     summary="Редактировать поле с информацией по конкретной машине",
     *     operationId="/api/cars/{cars}(PUT)",
     *     @OA\Response(
     *         response="200",
     *         description="Редактирует поле с информацией по конкретной машине"
     *     ),
     *     @OA\RequestBody(
     *        required=true,
     *           @OA\JsonContent(ref="#/components/schemas/CarsStoreRequest")
     *      )
     * )
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarsStoreRequest $request, Cars $car)
    {
        $car->update($request->validated());
        return new ResourcesCars($car);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @OA\Delete(
     *     path="/api/cars/26",
     *     tags={"Машины"},
     *     summary="Удалить поле с информацией по конкретной машине",
     *     operationId="/api/cars/{cars}(DELETE)",
     *     @OA\Response(
     *         response="200",
     *         description="Удаляет поле с информацией по конкретной машине"
     *     )
     * )
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cars $car)
    {
        $car->delete();
        return response(null, 200);
    }
}
