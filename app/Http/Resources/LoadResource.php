<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoadResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'photo' => $this->photo,
            'volume' => $this->volume,
            'fromCity' => $this->fromCity->only('lat', 'lng', 'name'),
            'toCity' => $this->toCity,
            'fromCityName' => $this->fromCityName,
            'toCityName' => $this->toCityName,
        ];
    }
}
