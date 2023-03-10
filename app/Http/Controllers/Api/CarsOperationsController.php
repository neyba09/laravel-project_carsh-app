<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarsOperationsStoreRequest;
use App\Models\Cars_operations;
use App\Http\Resources\CarsOperations as ResourcesCarsOperations;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Jobs\CarsOperationsJob;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

class CarsOperationsController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @OA\Get(
     *      path="/api/carsoperations",
     *      operationId="/api/carsoperations(GET)",
     *      tags={"Операции с машинами"},
     *      summary="Получение списка операций по машинам",
     *     @OA\Response(
     *          response=200,
     *          description="Возвращает список операций по машинам"
     *      )
     * )
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cache = Cache::get(Route::current()->uri);

        if($cache) {
            return $cache;
        }

        $cache = ResourcesCarsOperations::collection(Cars_operations::all());
        Cache::put(Route::current()->uri, $cache, now()->addMinutes(300));
        return $cache;
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @OA\Post(
     *     path="/api/carsoperations",
     *     tags={"Операции с машинами"},
     *     operationId="/api/carsoperations(POST)",
     *     summary="Добавить операцию с машиной",
     *     @OA\Response(
     *         response="200",
     *         description="Создание новой операции с машиной"
     *     ),
     *     @OA\RequestBody(
     *        required=true,
     *           @OA\JsonContent(ref="#/components/schemas/CarsOperationsStoreRequest")
     *      )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(CarsOperationsStoreRequest $request)
    {
        dispatch(new CarsOperationsJob($request->validated()));
    }

    /**
     * Display the specified resource.
     * 
     * @OA\Get(
     *      path="/api/carsoperations/2",
     *      operationId="/api/carsoperations/{carsoperations}(GET)",
     *      tags={"Операции с машинами"},
     *      summary="Вернуть конкретную операцию с машиной",
     *     @OA\Response(
     *          response="200",
     *          description="Возвращает конкретную операцию с машиной",
     *     )
     * )
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cars_operations $carsoperation)
    {
        $cache = Cache::get(Route::current()->uri);

        if($cache) {
            return $cache;
        }

        $cache = new ResourcesCarsOperations($carsoperation);
        Cache::put(Route::current()->uri, $cache, now()->addMinutes(300));
        return $cache;
    }

    /**
     * Update the specified resource in storage.
     *
     *    @OA\Put(
     *      path="/api/carsoperations/2",
     *      operationId="/api/carsoperations/{carsoperations}(PUT)",
     *      tags={"Операции с машинами"},
     *      summary="Редактировать конкретную операцию с машиной",
     *     @OA\Response(
     *          response="200",
     *          description="Редактирует конкретную операцию с машиной",
     *     ),
     *     @OA\RequestBody(
     *        required=true,
     *           @OA\JsonContent(ref="#/components/schemas/CarsOperationsStoreRequest")
     *      )
     * )
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarsOperationsStoreRequest $request, Cars_operations $carsoperation)
    {
        $carsoperation->update($request->validated());
        return new ResourcesCarsOperations($carsoperation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @OA\Delete(
     *      path="/api/carsoperations/4",
     *      operationId="/api/carsoperations/{carsoperations}(DELETE)",
     *      tags={"Операции с машинами"},
     *      summary="Удаляет конкретную операцию машиной",
     *     @OA\Response(
     *         response="200",
     *         description="Удаление конкретной операции с машиной"
     *     )
     * )
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cars_operations $carsoperation)
    {
        $carsoperation->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
