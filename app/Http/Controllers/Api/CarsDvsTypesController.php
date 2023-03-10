<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarsDvsTypesStoreRequest;
use Illuminate\Http\Request;
use App\Models\Cars_dvs_type;
use App\Http\Resources\CarsDvsTypes;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class CarsDvsTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
     *      path="/api/dvstype",
     *      operationId="/api/dvstype(GET)",
     *      tags={"Типы бензина"},
     *      summary="Получение списка типов бензина",
     *     @OA\Response(
     *          response=200,
     *          description="Возвращает список типов бензина"
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

        $cache = CarsDvsTypes::collection(Cars_dvs_type::all());
        Cache::put(Route::current()->uri, $cache, now()->addMinutes(300));
        return $cache;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @OA\Post(
     *     path="/api/dvstype",
     *     tags={"Типы бензина"},
     *     summary="Добавить новый тип бензина",
     *     operationId="/api/dvstype(POST)",
     *     @OA\Response(
     *         response="200",
     *         description="Добавляет новый тип бензина"
     *     ),
     *      @OA\RequestBody(
     *        required=true,
     *           @OA\JsonContent(ref="#/components/schemas/CarsDvsTypesStoreRequest")
     *      )
     * )
     *
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarsDvsTypesStoreRequest $request)
    {
        $dvstypes = Cars_dvs_type::create($request->validated());
        return new CarsDvsTypes($dvstypes);
    }

    /**
     * Display the specified resource.
     *
     *  @OA\Get(
     *     path="/api/dvstype/2",
     *     tags={"Типы бензина"},
     *     summary="Вернуть поле с информацией по конкретному типу бензина",
     *     operationId="/api/dvstype/{dvstype}(GET)",
     *     @OA\Response(
     *         response="200",
     *         description="Возвращает поле с информацией по конкретному типу бензина"
     *     )
     * )
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cars_dvs_type $dvstype)
    {
        $cache = Cache::get(Route::current()->uri);

        if($cache) {
            return $cache;
        }

        $cache = new CarsDvsTypes($dvstype);
        Cache::put(Route::current()->uri, $cache, now()->addMinutes(300));
        return $cache;
    }

    /**
     * Update the specified resource in storage.
     *
     * @OA\Put(
     *     path="/api/dvstype/5",
     *     tags={"Типы бензина"},
     *     summary="Редактировать поле с информацией по конкретному типу бензина",
     *     operationId="/api/dvstype/{dvstype}(PUT)",
     *     @OA\Response(
     *         response="200",
     *         description="Редактирует поле с информацией по конкретному типу бензина"
     *     ),
     *     @OA\RequestBody(
     *        required=true,
     *           @OA\JsonContent(ref="#/components/schemas/CarsDvsTypesStoreRequest")
     *      )
     * )
     * 
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarsDvsTypesStoreRequest $request, Cars_dvs_type $dvstype)
    {
        $dvstype->update($request->validated());
        return new CarsDvsTypes($dvstype);
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @OA\Delete(
     *     path="/api/dvstype/5",
     *     tags={"Типы бензина"},
     *     summary="Удалить поле с информацией по конкретному типу бензина",
     *     operationId="/api/dvstype/{dvstype}(DELETE)",
     *     @OA\Response(
     *         response="200",
     *         description="Удаляет поле с информацией по конкретному типу бензина"
     *     )
     * )
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cars_dvs_type $dvstype)
    {
        $dvstype->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
