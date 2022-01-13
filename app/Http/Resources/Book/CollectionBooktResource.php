<?php

namespace App\Http\Resources\Book;

use Illuminate\Http\Resources\Json\JsonResource;

class CollectionBooktResource extends JsonResource
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
            'book_key' => $this->book_key,
            'publish' => $this->publish,
            'user_id' => $this->user,
            'category_id' => $this->category,
            'tag_id' => $this->tag,
            'title' => $this->title,
            'slug' => $this->slug,
            'price' => $this->price,
            'thumbnail' => $this->takeImage,
            'file_id' => $this->file,
        ];
    }
}
