<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CycletimeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            //'id' => $this->id,
            'workweek' => $this->workweek,
            'cycletime_monday' => $this->cycletime_monday,
            'cycletime_tuesday' => $this->cycletime_tuesday,
            'cycletime_tuesday' => $this->cycletime_tuesday,
            'cycletime_wednesday' => $this->cycletime_wednesday,
            'cycletime_thursday' => $this->cycletime_thursday,
            'cycletime_friday' => $this->cycletime_friday,
            'cycletime_saturday' => $this->cycletime_saturday,
            'cycletime_sunday' => $this->cycletime_sunday,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
