<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Group extends Model implements Auditable
{
    use HasFactory;
    use AuditableTrait;

     protected $fillable = [
        'name',
        'parentID',
        'permissionID',
        'extraField',
        'parentLevel',
        'sort',
        'sizeMax',
        'sizeUse',
    ];
    
     public function user()
    {
        return $this->hasMany(Group::class);
    }
}
