<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Predmet;
use App\Models\Razred;

class PredmetRazred extends Model
{
    use HasFactory;
    protected $fillable=[
        'predmetId',
        'razredId',
        'fondCasova'

    ];
    public function predmet()
    {
        return $this->belongsTo(Predmet::class, 'predmetId');
    }

    public function razred()
    {
        return $this->belongsTo(Razred::class, 'razredId');
    }

    public function ocene()
   {
    return $this->hasMany(Ocena::class, ['predmetId', 'razredId']);
   }


   /* public function ocena()
    {
    return $this->hasMany(Ocena::class, ['predmetId', 'razredId']);
    }
*/
}


