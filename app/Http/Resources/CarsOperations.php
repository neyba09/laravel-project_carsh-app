<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarsOperations extends JsonResource
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
            'cars_id'=>$this->cars_id,
            'users_id'=>$this->users_id,
            'cars_status_id'=>$this->cars_status_id,
            'data_time_operation'=>$this->data_time_operation,
            'GPS_cars_latitude'=>$this->GPS_cars_latitude,
            'GPS_cars_longitude'=>$this->GPS_cars_longitude,
        ];
    }
}
