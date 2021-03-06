<?php

namespace App\Http\Resources\Book;

use Illuminate\Http\Resources\Json\JsonResource;

class SingleBooktResource extends JsonResource
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
            'book_file' => asset("/storage/" . $this->book_file),
            'file_id' => $this->file,
            'approved' => $this->approved,
            'year' => $this->year,
            'page' => $this->page,
            'payment' => $this->payment,
            'description' => $this->description,
            'created_at' => $this->created_at->format('d F, Y'),
            'discon' => $this->discon,
            'sale' => $this->order->count(),
            'comment' =>$this->comment->count(),
            'book_count' => $this->user->book->count(),
            'status_purchased' => auth()->user()->purchased()->where('book_id', $this->id)->first() ? 1 : 0,
        ];
    }
}
