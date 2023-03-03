<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      required={"users"},
 *      schema="UsersStoreRequest",
 *      @OA\Property(property="last_name", type="string",  example="Егоров", description="фамилия"),
 *      @OA\Property(property="first_name", type="string",  example="Олег", description="имя"),
 *      @OA\Property(property="middle_name", type="string",  example="Олегович", description="отчество"),
 *      @OA\Property(property="phone_number", type="integer",  example="89228124012", description="номер тел"),
 *      @OA\Property(property="passport_series", type="integer",  example="5612", description="серия паспорта"),
 *      @OA\Property(property="passport_num", type="integer",  example="123412", description="номер паспорта"),
 *      @OA\Property(property="users_status_id", type="integer",  example="1", description="id статуса юзера"),
 * )
 */

class UsersStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'last_name'=> 'required|string',
            'first_name'=> 'required|string',
            'middle_name'=> 'required|string',
            'phone_number'=> 'required|integer',
            'passport_series'=> 'required|integer',
            'passport_num'=> 'required|integer',
            'users_status_id'=> 'required|integer'
        ];
    }
}
