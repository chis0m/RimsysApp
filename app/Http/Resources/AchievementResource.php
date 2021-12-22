<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AchievementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->{'id'},
            'reference' => $this->{'reference'},
            'work_experience_id' => $this->{'work_experience_id'},
            'title' => $this->{'title'},
            'description' => $this->{'description'}
        ];
    }
}
