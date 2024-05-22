<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'passport_url',
        'designation',
        'nationality',
        'DOB',
        'passport_number',
        'passport_date_of_expiry',
        'passport_date_of_issue'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
