<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dete extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable=[
        'roditeljId',
        'ucenikId',

    ];
    public function roditelj()
    {
        return $this->belongsTo(Roditelj::class, 'roditeljId');
    }

    public function ucenik()
    {
        return $this->belongsTo(Ucenik::class, 'ucenikId');
    }
}
