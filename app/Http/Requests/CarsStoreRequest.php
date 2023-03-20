<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      required={"cars"},
 *      schema="CarsStoreRequest",
 *      @OA\Property(property="cars_models_id", type="integer",  example="1", description="id модели машины"),
 *      @OA\Property(property="car_number", type="string",  example="к123не", description="номер машины"),
 *      @OA\Property(property="car_year", type="integer",  example="2019", description="год выпуска машины"),
 *      @OA\Property(property="cars_dvs_type_id", type="integer",  example="3", description="тип двигателя"),
 *      @OA\Property(property="cars_status_id", type="integer",  example="1", description="id ")
 * )
 */

class CarsStoreRequest extends FormRequest
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
            'cars_models_id'=>'required|uuid',
            'car_number'=>'required|string',
            'car_year'=>'required|integer',
            'cars_dvs_type_id'=>'required|uuid',
            'cars_status_id'=>'required|uuid'
        ];
    }
}
