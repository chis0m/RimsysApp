<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkExperienceResource extends JsonResource
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
            'company' => $this->{'company'},
            'title' => $this->{'title'},
            'position' => $this->{'position'},
            'stack' => $this->{'stack'},
            'start_year' => Carbon::parse($this->{'start_year'})->toFormattedDateString(),
            'end_year' => Carbon::parse($this->{'end_year'})->toFormattedDateString(),
            'till_present' => $this->{'till_present'},
            'image_url' => $this->{'image_url'},
            'achievements' => AchievementResource::collection($this->{'achievements'}),
        ];
    }
}
