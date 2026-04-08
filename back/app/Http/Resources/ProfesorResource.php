<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfesorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public static $wrap = 'profesor';
    
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'ime' => $this->ime,
            'prezime' => $this->prezime,
            'predmet'=> $this->predmet->naziv, 
            'odeljenja' => $this->odeljenja->map(function ($odeljenje) {
                return $odeljenje->razredId . '-' . $odeljenje->indeks;
            }),
        ];
    }
}
