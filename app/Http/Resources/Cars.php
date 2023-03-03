<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Cars extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'cars_models_id'=>$this->cars_models_id,
            'car_number'=>$this->car_number,
            'car_year'=>$this->car_year,
            'cars_dvs_type_id'=>$this->cars_dvs_type_id,
            'cars_status_id'=>$this->cars_status_id,
        ];
    }
}
