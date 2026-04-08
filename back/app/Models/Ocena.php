<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PredmetRazred;

class Ocena extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'ucenikId', 
        'predmetId', 
        'razredId',
        'datum', 
        'opis', 
        'polugodiste', 
        'vrednost', 
        'profesorId'];

        public function setKeysForSaveQuery($query)
        {
            $query
                ->where('ucenikId', $this->ucenikId)
                ->where('predmetId', $this->predmetId)
                ->where('razredId', $this->razredId)
                ->where('datum', $this->datum);
            return $query;
        }

    public function ucenik()
    {
        return $this->belongsTo(Ucenik::class, 'ucenikId');
    }
  
    public function predmetRazred() 
    {
        return $this->belongsTo(PredmetRazred::class, ['predmetId', 'razredId']);
    }

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'profesorId');
    }
}
