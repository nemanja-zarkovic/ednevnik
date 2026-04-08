<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\PredmetRazred;

class PredmetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        $razredi = PredmetRazred::join('razreds', 'predmet_razreds.razredId', '=', 'razreds.id')
        ->where('predmet_razreds.predmetId', $this->id)
        ->pluck('razreds.godinaRazreda')
        ->toArray();

        return [
            'id' => $this->id,
            'naziv' => $this->naziv,
            'razredi' => $razredi,
        ];
    }
}
