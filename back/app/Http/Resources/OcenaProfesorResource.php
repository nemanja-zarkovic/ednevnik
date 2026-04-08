<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OcenaProfesorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ime' => $this->resource->ucenik->ime,
            'prezime' => $this->resource->ucenik->prezime,
            'ocena' => $this->resource->vrednost,
            'opis' => $this->resource->opis,
            'datum' => $this->resource->datum,
            'polugodiste' => $this->resource->polugodiste,
        ];
    }
}
