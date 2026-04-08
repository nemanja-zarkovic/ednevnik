<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Predavac extends Model
{
    use HasFactory;
public $timestamps=false;

    protected $fillable=[
        'profesorId',
        'odeljenjeId',

    ];
    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'profesorId');
    }

    public function odeljenje()
    {
        return $this->belongsTo(Odeljenje::class, 'odeljenjeId');
    }
}
