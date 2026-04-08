<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Predmet extends Model
{
    use HasFactory;
    public $timestamps=false;
    
    protected $fillable=[
        'id',
        'naziv'
    ];

    public function razredi(): HasMany
    {
        return $this->hasMany(PredmetRazred::class, 'predmetId');
    }
}
