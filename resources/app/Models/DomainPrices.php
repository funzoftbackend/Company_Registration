<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class DomainPrices extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'domain_prices';
    protected $fillable = [
        'price',
        'domain_id',
        'unit',
        'package_name'
    ];
    public function domain()
    {
        return $this->belongsTo(ServiceDomain::class, 'domain_id');
    }
}

