<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory,HasApiTokens, Notifiable;

    protected $fillable = [
        'email',
        'user_role',
        'name',
        'password',
        'mobile_no',
        'country',
        'package_name',
        'package_price',
        'passport_one_img',
        'passport_two_img',
        'amount',
        'amount_type',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function leads()
    {
        return $this->hasMany(Lead::class, 'leads_created_by');
    }
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
