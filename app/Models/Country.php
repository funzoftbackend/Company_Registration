<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Country;
class Country extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'countries';
    protected $fillable = [
        'name',
    ];
       public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}

