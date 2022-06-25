<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeliveriesResource extends JsonResource
{

    private $statusFilter = array(1 => "not completed", 2 => "completed", 3 => "canceled");

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'address' => $this->address->title,
            'date' => $this->route ? $this->route->date : "None",
            'sum' => number_format($this->lines->sum('price'), 2),
            'status' => $this->statusFilter[$this->status] ? $this->statusFilter[$this->status] : "error",
        ];
    }
}
