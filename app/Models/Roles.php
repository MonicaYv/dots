<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Roles extends Model implements Auditable
{
    use HasFactory;
     use AuditableTrait;

    protected $fillable = [
        'name',
        'description',
        'upload_limit',
        'file_manage_settings',
        'user_settings',
    ];
    
    public function user()
    {
        return $this->hasMany(Roles::class);
    }
}
