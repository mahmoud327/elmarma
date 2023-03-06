<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'title' => $this->title,
            'desc' => $this->desc,
            'image' => $this->image_path,
            'type'=>$this->type,
            'created_at' => date('Y-m-d', strtotime($this->created_at)),
            'category'=>CategoryResource::make($this->whenLoaded('category'))

        ];

    }

}
