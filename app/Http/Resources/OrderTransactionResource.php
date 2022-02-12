<?php

namespace App\Http\Resources;

use App\Http\Resources\Book\SingleBooktResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderTransactionResource extends JsonResource
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
            'user_check' => auth()->id(),
            'user_id' => $this->user_id,
            'order_user' => $this->userOrder,
            'read' => $this->read,
            'read_author' => $this->read_author,
            'book_id' => new SingleBooktResource($this->book),
        ];
    }
}
