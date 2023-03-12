<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MediaPostResource extends JsonResource
{
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'full_path' => asset('uploads/posts/'.$this->url),


        ];

    }

}
