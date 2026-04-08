<?php
namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Ucenik extends Model implements Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'ime',
        'prezime',
        'odeljenjeId',
        'username',
        'password',
        'email',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return null;
    }

    public function setRememberToken($value)
    {
        // ...
    }

    public function getRememberTokenName()
    {
        return null;
    }

    public function odeljenje()
    {
        return $this->belongsTo(Odeljenje::class, 'odeljenjeId');
    }
}

