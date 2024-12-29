<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            "name"=>$this->name,
            "contact"=>$this->phone,
            "tel"=>$this->tel,
            "logo"=>asset($this->logo),
            "email"=>$this->email,
            "youtube"=>$this->youtube,
            "facebook"=>$this->facebook
        ];
    }
}
