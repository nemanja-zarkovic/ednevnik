<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\PredmetRazred;

use App\Models\Predmet;

class OcenaUcenikResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function nadjiPredmet($predmetId) {

        $predmetRazred = PredmetRazred::where('predmetId', $predmetId)->first();
    
    if ($predmetRazred) {
        return $predmetRazred->predmet->naziv;
    } else {
        return null; 
    }
    }

    public function toArray(Request $request): array
    {
        $naziv = $this->nadjiPredmet($this->resource->predmetId);

        return [

            'predmet' => $naziv,
            'ocena' => $this->resource->vrednost,
            'opis' => $this->resource->opis,
            'datum' => $this->resource->datum,
            'polugodiste' => $this->resource->polugodiste,
            
        ];
    
    }
}
