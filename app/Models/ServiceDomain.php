<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ServiceDomain extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'service_domain';
    protected $fillable = [
        'name',
        'service_id'
    ];
     public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function countries()
    {
        return $this->belongsToMany(Country::class, 'country_domain', 'domain_id', 'country_id');
    }
    public function countryDomain()
    {
        return $this->belongsToMany(CountryDomain::class, 'country_domain');
    }
}

