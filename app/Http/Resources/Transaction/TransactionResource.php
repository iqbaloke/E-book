<?php

namespace App\Http\Resources\Transaction;

use App\Http\Resources\Book\CollectionBooktResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'order_key' => $this->order_key,
            'book' => new CollectionBooktResource($this->book),
            'user_id' => $this->user,
            'price' => $this->price,
            'status' => $this->status,
            'expired' => $this->expired,
            'payament' => $this->payment,
            'created_at' => $this->created_at->format('d F, Y'),
        ];
    }
}
