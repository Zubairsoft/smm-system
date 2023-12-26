<?php

namespace App\Http\Resources\Supports\Lists;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //TODO make attribute for translate name
        return [
            'id' => $this->id,
            'name' => app()->currentLocale() == 'en' ? $this->name_en : $this->name_ar,
        ];
    }
}
