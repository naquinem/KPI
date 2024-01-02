<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OvertimeResource extends JsonResource
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
            'total_regular_hours' => $this->total_regular_hours,
            'total_work_hours' => $this->total_work_hours,
            'total_headcounts' => $this->total_headcounts,
            'total_overtime' => $this->total_overtime,
            'average_overtime' => $this->average_overtime,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
