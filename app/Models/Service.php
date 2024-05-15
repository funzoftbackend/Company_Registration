<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Country;
class Service extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'services';
    protected $fillable = [
        'name',
    ];
    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }
  
}

