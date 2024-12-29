<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "title"=>$this->title,
            "description"=>$this->description,
            "image"=>asset($this->image),
            "views"=>$this->views,
            "meta_title"=>$this->meta_title,
            "meta_description"=>$this->meta_description,
            "status"=>$this->status
        ];
    }
}
