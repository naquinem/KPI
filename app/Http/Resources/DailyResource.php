<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DailyResource extends JsonResource
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
            'planning_monday' =>$this->monday,
            'planning_tuesday' =>$this->tuesday,
            'planning_wednesday' =>$this->wednesday,
            'planning_thursday' =>$this->thursday,
            'planning_friday' =>$this->friday,
            'planning_saturday' =>$this->saturday,
            'planning_sunday' =>$this->sunday,
            'output_monday' => $this->monday,
            'output_tuesday' => $this->tuesday,
            'output_monday' => $this->monday,
            'output_tuesday' => $this->tuesday,
            'output_wednesday' => $this->wednesday,
            'output_thursday' => $this->thursday,
            'output_friday' => $this->friday,
            'output_saturday' => $this->saturday,
            'output_sunday' => $this->sunday,
            'percentage_monday' => $this->monday,
            'percentage_tuesday' => $this->tuesday,
            'percentage_wednesday' => $this->wednesday,
            'percentage_thursday' => $this->thursday,
            'percentage_friday' => $this->friday,
            'percentage_saturday' => $this->saturday,
            'percentage_sunday' => $this->sunday,
            'total_percentage' => $this->total_percentage,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
