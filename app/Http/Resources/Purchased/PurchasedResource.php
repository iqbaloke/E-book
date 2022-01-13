<?php

namespace App\Http\Resources\Purchased;

use App\Http\Resources\Book\CollectionBooktResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PurchasedResource extends JsonResource
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
            'book' => new CollectionBooktResource($this->book),
            'created_at' => $this->created_at->format('d F, Y'),
        ];
    }
}
