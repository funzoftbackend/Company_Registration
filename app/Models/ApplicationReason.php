<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationReason extends Model
{
    use HasFactory;
    protected $table = 'application_reasons';
    protected $fillable = [
        'application_id',
        'reason'
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
