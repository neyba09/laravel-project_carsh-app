<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersStoreRequest;
use App\Http\Resources\Users as ResourcesUsers;
use Illuminate\Http\Request;
use App\Models\Users;




class UsersController extends Controller
{

    // public function index () {
    //     $users = Users::All();
    //     return ResourcesUsers::collection($users);
    // }

    // public function store (UsersStoreRequest $request) {
    //     $user = Users::create($request->validated());
    //     return new ResourcesUsers($user);
    // }

    //  public function show ( Users $users) {
    //     return new ResourcesUsers($users);
    // }

    // public function update(UsersStoreRequest $request, Users $users) {
        
    //     $users->update($request->validated());
       
    //     return new ResourcesUsers($users);
    // }

    // public function destroy(Users $users) {
    //     $users->delete();
    //     return response(null, 200);
    // }
}