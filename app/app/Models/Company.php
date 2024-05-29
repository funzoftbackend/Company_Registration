<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'capital',
        'currency',
        'number_of_partners',
        'owner_nationality',
        'company_type',
        'financial_year_ending_date',
        'status',
        'suggested_names',
        'activities',
        'application_id',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function partners()
    {
        return $this->hasMany(Partner::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
