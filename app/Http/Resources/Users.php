<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Users extends JsonResource
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
            'last_name'=>$this->last_name,
            'first_name'=>$this->first_name,
            'middle_name'=>$this->middle_name,
            'phone_number'=>$this->phone_number, 
            'passport_series'=>$this->passport_series,
            'passport_num'=>$this->passport_num,
        ];
    }
}
