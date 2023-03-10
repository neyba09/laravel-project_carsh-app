<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CarsMarksStoreRequest;
use App\Http\Resources\CarsMarks as ResourcesCarsMarks;
use App\Models\Cars_mark;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

class CarsMarksController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @OA\Get(
     *      path="/api/carsmarks",
     *      operationId="/api/carsmarks(GET)",
     *      tags={"Марки машин"},
     *      summary="Получение списка марок машин",
     *     @OA\Response(
     *          response=200,
     *          description="Возвращает список марок машин"
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

        $cache = ResourcesCarsMarks::collection(Cars_mark::all());
        Cache::put(Route::current()->uri, $cache, now()->addMinutes(300));
        return $cache;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @OA\Post(
     *     path="/api/carsmarks",
     *     tags={"Марки машин"},
     *     summary="Добавить новую марку машины",
     *     operationId="/api/carsmarks(POST)",
     *     @OA\Response(
     *         response="200",
     *         description="Добавляет новую марку машины"
     *     ),
     *      @OA\RequestBody(
     *        required=true,
     *           @OA\JsonContent(ref="#/components/schemas/CarsMarksStoreRequest")
     *      )
     * )
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarsMarksStoreRequest $request)
    {
        $carsmarks = Cars_mark::create($request->validated());
        return new ResourcesCarsMarks($carsmarks);
    }

    /**
     * Display the specified resource.
     *
     *  @OA\Get(
     *     path="/api/carsmarks/2",
     *     tags={"Марки машин"},
     *     summary="Вернуть конкретную марку машины",
     *     operationId="/api/carsmarks/{carsmarks}(GET)",
     *     @OA\Response(
     *         response="200",
     *         description="Возвращает поле с информацией по конкретной марки машины"
     *     )
     * )
     * 
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cars_mark $carsmark)
    {
        $cache = Cache::get(Route::current()->uri);

        if($cache) {
            return $cache;
        }

        $cache = new ResourcesCarsMarks($carsmark);
        Cache::put(Route::current()->uri, $cache, now()->addMinutes(300));
        return $cache;
    }

    /**
     * Update the specified resource in storage.
     *
     * @OA\Put(
     *     path="/api/carsmarks/5",
     *     tags={"Марки машин"},
     *     summary="Редактировать поле с информацией по конкретной марки машины",
     *     operationId="/api/carsmarks/{carsmarks}(PUT)",
     *     @OA\Response(
     *         response="200",
     *         description="Редактирует поле с информацией по конкретной марки машины"
     *     ),
     *     @OA\RequestBody(
     *        required=true,
     *           @OA\JsonContent(ref="#/components/schemas/CarsMarksStoreRequest")
     *      )
     * )
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarsMarksStoreRequest $request, Cars_mark $carsmark)
    {
        $carsmark->update($request->validated());
        return new ResourcesCarsMarks($carsmark);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @OA\Delete(
     *     path="/api/carsmarks/5",
     *     tags={"Марки машин"},
     *     summary="Удалить поле с информацией по конкретной марки машины",
     *     operationId="/api/carsmarks/{carsmarks}(DELETE)",
     *     @OA\Response(
     *         response="200",
     *         description="Удаляет поле с информацией по конкретной марки машины"
     *     )
     * )
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cars_mark $carsmark)
    {
        $carsmark->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
