<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersStatusesStoreRequest;
use App\Http\Requests\UsersStoreRequest;
use App\Http\Resources\UsersStatuses as ResourcesUsersStatuses;
use App\Models\Users_status;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

class UsersStatusesController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/usersstatuses",
     *     tags={"Статусы юзеров"},
     *     summary="Возвращает статус пользователя",
     *     operationId="/api/usersstatuses(GET)",
     *     @OA\Response(
     *         response="200",
     *         description="Возвращает список статусов пользователей"
     *     )
     * )
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cache = Cache::get(Route::current()->uri);
        
        if($cache) {
            return $cache;
        }

        $cache = ResourcesUsersStatuses::collection(Users_status::all());
        Cache::put(Route::current()->uri, $cache, now()->addMinutes(300));
        return $cache; 
    }

    /**
     * Display a listing of the resource.
     *
     * @OA\Post(
     *     path="/api/usersstatuses",
     *     tags={"Статусы юзеров"},
     *     summary="Добавить новый статус пользователя",
     *     operationId="/api/usersstatuses(POST)",
     *     @OA\Response(
     *         response="200",
     *         description="Создает новый статус пользователя"
     *     ),
     *      @OA\RequestBody(
     *        required=true,
     *           @OA\JsonContent(ref="#/components/schemas/UsersStatusesStoreRequest")
     *      )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

public function store(UsersStatusesStoreRequest $request)
        {
            $usersstatus = Users_status::create($request->validated());
            return new ResourcesUsersStatuses($usersstatus);
        }

    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
     *     path="/api/usersstatuses/3",
     *     tags={"Статусы юзеров"},
     *     summary="Вернуть статус конкретного пользователя",
     *     operationId="/api/usersstatuses/{userstatuses}(GET)",
     *     @OA\Response(
     *         response="200",
     *         description="Возвращает статус конкретного пользователя",
     *        )
     *     )
     * )
     * Display a listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Users_status $usersstatus)
    {
        $cache = Cache::get(Route::current()->uri);

        if($cache) {
            return $cache;
        }

        $cache = new ResourcesUsersStatuses($usersstatus);
        Cache::put(Route::current()->uri, $cache, now()->addMinutes(300));
        return $cache;
    }

    /**
     * Update the specified resource in storage.
     * 
     * @OA\Put(
     *     path="/api/usersstatuses/{usersstatuses}",
     *     tags={"Статусы юзеров"},
     *     summary="Редактировать статус пользователя",
     *     operationId="/api/usersstatuses/{userstatuses}(PUT)",
     *     @OA\Response(
     *         response="200",
     *         description="Редактирует статус конкретного пользователя"
     *     ),
     *     @OA\RequestBody(
     *        required=true,
     *           @OA\JsonContent(ref="#/components/schemas/UsersStatusesStoreRequest")
     *      )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersStatusesStoreRequest $request, Users_status $usersstatus)
    {
        $usersstatus->update($request->validated());
        return new ResourcesUsersStatuses($usersstatus);
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @OA\Delete(
     *     path="/api/usersstatuses/9",
     *     tags={"Статусы юзеров"},
     *     summary="Удалить статус пользователя",
     *     operationId="/api/usersstatuses/{usersstatuses}(DELETE)",
     *     @OA\Response(
     *         response="200",
     *         description="Удаляет статус пользователя"
     *     )
     * )
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users_status $usersstatus)
    {
        $usersstatus->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
