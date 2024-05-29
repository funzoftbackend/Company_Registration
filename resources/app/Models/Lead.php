<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_created_by',
        'email',
        'phone_number'
    ];

   public function user()
    {
        return $this->belongsTo(User::class, 'leads_created_by');
    }

    public function application()
    {
        return $this->hasOne(Application::class);
    }
}
