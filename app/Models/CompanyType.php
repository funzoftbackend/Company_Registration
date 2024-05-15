<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class CompanyType extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'company_types';
    protected $fillable = [
        'name',
    ];
}
