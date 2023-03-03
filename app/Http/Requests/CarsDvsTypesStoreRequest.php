<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      required={"car_dvs_types"},
 *      @OA\Property(property="dvs_type", type="string",  example="гидрогелевый", description="тестовый тип двигателя машины"),
 * )
 */

class CarsDvsTypesStoreRequest extends FormRequest
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
            'dvs_type'=>'required|string'
        ];
    }
}
