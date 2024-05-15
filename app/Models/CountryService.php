<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CountryService extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'country_service';
    protected $fillable = [
        'service_id',
        'country_id'
    ];
     public function countries()
    {
        return $this->hasMany(Country::class, 'country_id', 'id');
    }
     public function services()
    {
        return $this->hasMany(Service::class, 'service_id', 'id');
    }
}

