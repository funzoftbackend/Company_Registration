<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ServiceSteps extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'service_steps';
    protected $fillable = [
        'name',
        'country_service_id'
    ];
     public function country_service()
    {
        return $this->belongsTo(CountryService::class, 'country_service_id');
    }
}

