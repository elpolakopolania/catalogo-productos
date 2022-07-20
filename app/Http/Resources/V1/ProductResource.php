<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'size' => $this->size,
            'observation' => $this->observation,
            'trademarks_id' => $this->trademark->id,
            'trademark' => [
                'id' => $this->trademark->id,
                'name' => $this->trademark->name,
                'reference' => $this->trademark->reference,
            ],
            'inventory_quantity' => $this->inventory_quantity,
            'boarding_date' => date('d/m/Y', strtotime($this->boarding_date))
        ];
    }
}
