<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odeljenje extends Model
{
    use HasFactory;
    protected $fillable=[
        
        'indeks',
        'razredId'

    ];

    public function razred()
    {
        return $this->belongsTo(Razred::class, 'razredId');
    }

    public function ucenici()
    {
    return $this->hasMany(Ucenik::class, 'odeljenjeId');
    }

}
