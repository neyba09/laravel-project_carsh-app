<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersStoreRequest;
use App\Http\Resources\Users as ResourcesUsers;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
     *     path="/api/users",
     *     tags={"Юзеры"},
     *     summary="Вывести список пользователей",
     *     operationId="/api/users(GET)",
     *     @OA\Response(
     *         response="200",
     *         description="Возвращает список пользователей"
     *     )
     * )
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cache = Cache::get(Route::current()->uri); 

        if ($cache) {
            return $cache;
        }       
        $cache = ResourcesUsers::collection(Users::all());
        Cache::put(Route::current()->uri, $cache, now()->addMinutes(300));
        return $cache;
        
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @OA\Post(
     *     path="/api/users",
     *     tags={"Юзеры"},
     *     summary="Добавить нового пользователя",
     *     operationId="/api/users(POST)",
     *     @OA\Response(
     *         response="200",
     *         description="Создает нового пользователя"
     *     ),
     *     @OA\RequestBody(
     *        required=true,
     *           @OA\JsonContent(ref="#/components/schemas/UsersStoreRequest")
     *      )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersStoreRequest $request)
    {
        $user = Users::create($request->validated());
        return new ResourcesUsers($user);
    }

    /**
     * Display the specified resource.
     *
     * 
     * @OA\Get(
     *     path="/api/users/2",
     *     tags={"Юзеры"},
     *     summary="Вернуть конкретного пользователя",
     *     operationId="/api/users/{users}(GET)",
     *     @OA\Response(
     *         response="200",
     *         description="Возвращает конкретного пользователя"
     *     )
     * )
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Users $user)
    {
        $cache = Cache::get(Route::current()->uri); 

        if ($cache) {
            return $cache;
        }
         
        $cache = new ResourcesUsers($user);
        Cache::put(Route::current()->uri, $cache, now()->addMinutes(300));
        return $cache;
    }

    /**
     * Update the specified resource in storage.
     *
     * @OA\Put(
     *     path="/api/users/2",
     *     tags={"Юзеры"},
     *     summary="Редактировать конкретного пользователя",
     *     operationId="/api/users/{users}(PUT)",
     *     @OA\Response(
     *         response="200",
     *         description="Редактирует конкретного пользователя"
     *     ),
     *     @OA\RequestBody(
     *        required=true,
     *           @OA\JsonContent(ref="#/components/schemas/UsersStoreRequest")
     *      )
     * )
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersStoreRequest $request, Users $user)
    {
        $user->update($request->validated());
        return new ResourcesUsers($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @OA\Delete(
     *     path="/api/users/7",
     *     tags={"Юзеры"},
     *     summary="Удалить конкретного пользователя",
     *     operationId="/api/users/{users}(DELETE)",
     *     @OA\Response(
     *         response="200",
     *         description="Удаляет пользователя"
     *     )
     * )
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $user)
    {
        $user->delete();
        return response(null, 200);
    }
}
