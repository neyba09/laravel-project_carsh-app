<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarsModelsStoreRequest;
use App\Http\Resources\CarsModels as ResourcesCarsModels;
use Illuminate\Http\Request;
use App\Models\Cars_models;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

class CarsModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @OA\Get(
     *      path="/api/carsmodels",
     *      operationId="/api/carsmodels(GET)",
     *      tags={"Модели машин"},
     *      summary="Получение списка моделей машин",
     *     @OA\Response(
     *          response=200,
     *          description="Возвращает список моделей машин"
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

        $cache = ResourcesCarsModels::collection(Cars_Models::all());
        Cache::put(Route::current()->uri, $cache, now()->addMinutes(300));
        return $cache;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @OA\Post(
     *     path="/api/carsmodels",
     *     tags={"Модели машин"},
     *     operationId="/api/carsmodels(POST)",
     *     summary="Добавить модель машины",
     *     @OA\Response(
     *         response="200",
     *         description="Добавление новой модели машиной"
     *     ),
     *     @OA\RequestBody(
     *        required=true,
     *           @OA\JsonContent(ref="#/components/schemas/CarsModelsStoreRequest")
     *      )
     * )
     *
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarsModelsStoreRequest $request)
    {
        $carsmodels = Cars_models::create($request->validated());
        return new ResourcesCarsModels($carsmodels);
    }

    /**
     * Display the specified resource.
     *
     * @OA\Get(
     *      path="/api/carsmodels/2",
     *      operationId="/api/carsmodels/{carsmodels}(GET)",
     *      tags={"Модели машин"},
     *      summary="Вернуть конкретную модель машины",
     *     @OA\Response(
     *          response="200",
     *          description="Возвращает конкретную модель машины",
     *     )
     * )
     * 
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cars_models $carsmodel)
    {
        $cache = Cache::get(Route::current()->uri);

        if($cache) {
            return $cache;
        }

        $cache = new ResourcesCarsModels($carsmodel);
        Cache::put(Route::current()->uri, $cache, now()->addMinutes(300));
        return $cache;
    }

    /**
     * Update the specified resource in storage.
     *
     *    @OA\Put(
     *      path="/api/carsmodels/2",
     *      operationId="/api/carsmodels/{carsmodels}(PUT)",
     *      tags={"Модели машин"},
     *      summary="Редактировать конкретную модель машины",
     *    @OA\Response(
     *          response="200",
     *          description="Редактирует конкретную модель машины",
     *     ),
     *    @OA\RequestBody(
     *        required=true,
     *           @OA\JsonContent(ref="#/components/schemas/CarsModelsStoreRequest")
     *      )
     * )
     * 
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarsModelsStoreRequest $request, Cars_models $carsmodel)
    {
        $carsmodel->update($request->validated());
        return new ResourcesCarsModels($carsmodel);
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @OA\Delete(
     *      path="/api/carsmodels/4",
     *      operationId="/api/carsmodels/{carsmodels}(DELETE)",
     *      tags={"Модели машин"},
     *      summary="Удаляет конкретную модель машины",
     *     @OA\Response(
     *         response="200",
     *         description="Удаление конкретной модели машины"
     *     )
     * )
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cars_models $carsmodel)
    {
        $carsmodel->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
