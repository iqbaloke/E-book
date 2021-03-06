<?php

namespace App\Http\Resources\Income;

use Illuminate\Http\Resources\Json\JsonResource;

class IncomeResource extends JsonResource
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
            'widraw_key' => $this->widraw_key,
            'nominal' => $this->nominal,
            'payment' => $this->payment,
            'payment_name' => $this->payment_name,
            'status' => $this->status,
            'created_at' => $this->created_at->format("d F, Y"),
        ];
    }
}
