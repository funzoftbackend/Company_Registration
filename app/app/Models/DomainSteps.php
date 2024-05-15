<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class DomainSteps extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'domain_steps';
    protected $fillable = [
        'name',
        'country_domain_id'
    ];
    public function domain()
    {
        return $this->belongsTo(Domain::class, 'country_domain_id');
    }
    public function countryDomain()
    {
        return $this->belongsTo(CountryDomain::class);
    }
}

