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
            'total_hours' => $this->total_hours,
            'regular_hours' => $this->regular_hours,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
