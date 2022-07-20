<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TrademarkCollection extends ResourceCollection
{

    public $collects = TrademarkResource::class; 
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'meta' => [
                'organization' => 'TiendApp',
                'authors' => [
                    'Gustavo Polania'
                ],
            ]
        ];
    }
}
