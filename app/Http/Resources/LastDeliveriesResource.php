<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LastDeliveriesResource extends JsonResource
{
    private $typeFilter = array(1 => "liquid", 2 => "solid");
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function toArray($request)
    {
        return [
            'id' => $this->last_delivery->id,
            'client' => $this->client->name,
            'title' => $this->title,
            'date' => $this->last_delivery->route ? $this->last_delivery->route->date : "None",
            'type' => $this->typeFilter[$this->last_delivery->type],
            'sum' => number_format($this->last_delivery->lines->sum('price'), 2),
        ];
    }
}
