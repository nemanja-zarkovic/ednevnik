<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OcenaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ucenikId' => $this->resource->ucenikId,
            'ucenik' => new UcenikResource($this->resource->ucenik),
            'predmetId' => $this->resource->predmetId,
            'razred' =>$this->resource->razredId,
            'datum' => $this->resource->datum,
            'opis' => $this->resource->opis,
            'polugodiste' => $this->resource->polugodiste,
            'ocena' => $this->resource->vrednost,
            'profesorId' => $this->resource->profesorId,
            'profesor' => new ProfesorResource($this->resource->profesor),

        ];
    }
}
