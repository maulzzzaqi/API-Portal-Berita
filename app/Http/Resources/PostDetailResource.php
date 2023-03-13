<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use NunoMaduro\Collision\Writer;

class PostDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'news_content' => $this->news_content,
            // 'author' => $this->author,
            'writer' => $this->writer,
            'created_at' => date_format($this->created_at, "m/d/y h:i:s"),
        ];
    }
}