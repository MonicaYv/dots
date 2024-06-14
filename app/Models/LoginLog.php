<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;



class LoginLog extends Model implements Auditable
{
    use HasFactory;

     use AuditableTrait;
     
    protected $fillable = [
        'user_id',
        'user_image',
        'login_time',
        'system_version',
        'system',
        'system_image',
        'browser',
        'browser_image',
        'login_address',
    
    ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
