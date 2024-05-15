<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\DomainSteps;
use App\Models\CountryDomain;
use App\Models\ServiceDomain;
class Service extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'services';
    protected $fillable = [
        'name',
    ];
   

     public function domains()
    {
        return $this->hasMany(ServiceDomain::class);
    }
  
}

