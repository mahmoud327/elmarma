<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MediaNewResource extends JsonResource
{
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'full_path' => asset('uploads/news/'.$this->url),


        ];

    }

}
