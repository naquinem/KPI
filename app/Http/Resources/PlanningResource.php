<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanningResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'workweek' => $this->workweek,
            'planning_monday' => $this->planning_monday,
            'planning_tuesday' => $this->planning_tuesday,
            'planning_wednesday' => $this->planning_wednesday,
            'planning_thursday' => $this->planning_thursday,
            'planning_friday' => $this->planning_friday,
            'planning_saturday' => $this->planning_saturday,
            'planning_sunday' => $this->planning_sunday,
            'output_monday' => $this->output_monday,
            'output_tuesday' => $this->output_tuesday,
            'output_wednesday' => $this->output_wednesday,
            'output_thursday' => $this->output_thursday,
            'output_friday' => $this->output_friday,
            'output_saturday' => $this->output_saturday,
            'output_sunday' => $this->output_sunday,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
