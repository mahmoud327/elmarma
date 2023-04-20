<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BnnerResource extends JsonResource
{
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'title' => $this->title,
            'desc' => $this->desc,
            'image_path' => $this->image_path,



        ];

    }

}
