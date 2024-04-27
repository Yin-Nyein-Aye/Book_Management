<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return[
            'idx' => $this->book_uniq_idx,
            'bookName' => $this->bookname,
            'contentOwner' => $this->owner->name,
            'publisher' => $this->publisher->name,
            'createdDate' => $this->created_timetick
        ];
    }

    public function with($request)
    {
        return[
            'version' => '1.0.0',
            'api_url' => url('http://127.0.0.1:8000/api/book'),
            'message' => 'Your action is successful'
        ];
    }
}
