<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class EducationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->{'id'},
            'reference' => $this->{'reference'},
            'school' => $this->{'school'},
            'course' => $this->{'course'},
            'start_year' => Carbon::parse($this->{'start_year'})->toFormattedDateString(),
            'end_year' => Carbon::parse($this->{'end_year'})->toFormattedDateString(),
        ];
    }
}
