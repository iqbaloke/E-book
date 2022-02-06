<?php

namespace App\Http\Resources\Category;

use App\Http\Resources\Book\CollectionBooktResource;
use App\Http\Resources\Tag\CollectionTagTagResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleCategoryResource extends JsonResource
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
            'name' => $this->category_name,
            'slug' => $this->slug,
            'count_book_in_category' => $this->book->count(),
            'book_in_category' => CollectionBooktResource::collection($this->book),
            'count_category_tag' => $this->tags->count(),
            'category_tag' => CollectionTagTagResource::collection($this->tags),
        ];
    }
}
