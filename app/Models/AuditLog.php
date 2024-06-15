<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'audits';

    protected $fillable = [
        'user_id', 'created_at', 'event', 'new_values'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
