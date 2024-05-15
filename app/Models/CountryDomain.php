<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CountryDomain extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'country_domain';
    protected $fillable = [
        'domain_id',
        'country_id'
    ];
    public function domain()
    {
        return $this->belongsTo(ServiceDomain::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function domainSteps()
    {
        return $this->hasMany(DomainSteps::class);
    }
}

