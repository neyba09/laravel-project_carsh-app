<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      required={"cars_marks"},
 *      @OA\Property(property="car_mark", type="string",  example="mazda", description="марка машины"),
 * )
 */

class CarsMarksStoreRequest extends FormRequest
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
            'car_mark'=>'required|string',
        ];
    }
}
