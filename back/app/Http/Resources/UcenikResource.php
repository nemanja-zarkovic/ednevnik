<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UcenikResource extends JsonResource
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
            'ime' => $this->ime,
            'prezime' => $this->prezime, 
            'odeljenjeId'=> $this->odeljenjeId,
            'odeljenje' => $this->odeljenje->razred->id . '-' . $this->odeljenje->indeks,
            'email' => $this->email, 
            'razred'=>$this->odeljenje->razredId,
        ];
    }
}
