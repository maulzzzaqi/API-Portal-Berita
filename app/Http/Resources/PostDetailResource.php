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
            'image' => $this->image,
            'news_content' => $this->news_content,
            'author_id' => $this->author,
            'writer' => $this->whenLoaded('writer'),
            'comment_total' => $this->whenLoaded('comments', function(){
                return count($this->comments);
            }),
            'comments' => $this->whenLoaded('comments', function(){
                return collect($this->comments)->each(function($comment){
                    $comment->commentator;
                    return $comment;
                });
            }),
            'created_at' => date_format($this->created_at, "m/d/y h:i:s"),
        ];
    }
}
