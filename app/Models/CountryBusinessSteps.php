<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CountryBusinessSteps extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'countries_business_steps';
    protected $fillable = [
        'name',
        'country_id',
        'level'
    ];
     public function user()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}

