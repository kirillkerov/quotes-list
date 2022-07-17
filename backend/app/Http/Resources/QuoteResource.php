<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuoteResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'author' => $this->author,
            'text' => $this->text,
            'created_at' => $this->created_at,
            'tags' => QuoteTagResource::collection($this->tags),
        ];
    }
}
