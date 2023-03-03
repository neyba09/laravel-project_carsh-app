<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      required={"car_operations"},
 *      @OA\Property(property="cars_id", type="integer",  example="1", description="id машины"),
 *      @OA\Property(property="users_id", type="integer",  example="2", description="id юзера"),
 *      @OA\Property(property="cars_status_id", type="integer",  example="1", description="id статуса машины"),
 *      @OA\Property(property="data_time_operation", type="date",  example="12.01.2023", description="дата и время опреации"),
 *      @OA\Property(property="GPS_cars_latitude", type="numeric",  example="32434.12333", description="gps широта"),
 *      @OA\Property(property="GPS_cars_longitude", type="numeric",  example="45434.72333", description="gps долгота")
 * )
 */

class CarsOperationsStoreRequest extends FormRequest
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
            'cars_id'=>'required|integer',
            'users_id'=>'required|integer',
            'cars_status_id'=>'required|integer',
            'data_time_operation'=>'required|date',
            'GPS_cars_latitude'=>'required|numeric',
            'GPS_cars_longitude'=>'required|numeric',
        ];
    }
}
