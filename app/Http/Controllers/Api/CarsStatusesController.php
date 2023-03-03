<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarsStatusesStoreRequest;
use App\Http\Resources\CarsStatuses;
use App\Models\Cars_status;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class CarsStatusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
     *     path="/api/carsstatuses",
     *     tags={"Статусы машин"},
     *     summary="Вывести список статусов машин",
     *     operationId="/api/carsstatuses(GET)",
     *     @OA\Response(
     *         response="200",
     *         description="Возвращает список статусов машин"
     *         )
     *  )
     * 
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return CarsStatuses::collection(Cars_status::all());
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @OA\Post(
     *     path="/api/carsstatuses",
     *     tags={"Статусы машин"},
     *     summary="Добавить новый статус машины",
     *     operationId="/api/carsstatuses(POST)",
     *     @OA\Response(
     *         response="200",
     *         description="Создает новый статус машины"
     *     ),
     *      @OA\RequestBody(
     *        required=true,
     *           @OA\JsonContent(ref="#/components/schemas/CarsStatusesStoreRequest")
     *      )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarsStatusesStoreRequest $request)
    {
        $carsstatuses = Cars_status::create($request->validated());
        return new CarsStatuses($carsstatuses);
    }

    /**
     * Display the specified resource.
     *
     *  @OA\Get(
     *     path="/api/carsstatuses/1",
     *     tags={"Статусы машин"},
     *     summary="Вернуть статус конкретной машины",
     *     operationId="/api/carsstatuses/{carsstatuses}(GET)",
     *     @OA\Response(
     *         response="200",
     *         description="Возвращает статус конкретного пользователя"
     *     )
     * )
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cars_status $carsstatus)
    {
        return new CarsStatuses($carsstatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @OA\Put(
     *     path="/api/carsstatuses/1",
     *     tags={"Статусы машин"},
     *     summary="Редактировать статус машины",
     *     operationId="/api/carsstatuses/{carsstatuses}(PUT)",
     *     @OA\Response(
     *         response="200",
     *         description="Редактирует статус конкретной машины"
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CarsStatusesStoreRequest")
     *     )
     * )
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarsStatusesStoreRequest $request, Cars_status $carsstatus)
    {
        $carsstatus->update($request->validated());
        return new CarsStatuses($carsstatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @OA\Delete(
     *     path="/api/carsstatuses/3",
     *     tags={"Статусы машин"},
     *     summary="Удалить статус машины",
     *     operationId="/api/carsstatuses/{carsstatuses}(DELETE)",
     *     @OA\Response(
     *         response="200",
     *         description="Удаляет статус машины"
     *     )
     * )
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cars_status $carsstatus)
    {
        $carsstatus->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
