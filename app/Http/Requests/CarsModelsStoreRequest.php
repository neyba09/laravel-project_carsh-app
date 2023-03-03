<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      required={"car_model"},
 *      @OA\Property(property="car_model", type="string",  example="test model", description="тестовая модель машины"),
 *      @OA\Property(property="cars_mark_id", type="integer",  example="1", description="id марки машины"),
 * )
 */

class CarsModelsStoreRequest extends FormRequest
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
            'car_model'=>'required|string',
            'cars_mark_id'=>'required|integer'
        ];
    }
}
