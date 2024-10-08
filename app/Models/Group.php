<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
        'parentID',
        'permissionID',
        'extraField',
        'parentLevel',
        'sort',
        'sizeMax',
        'sizeUse',
        'cID',
    ];
    
     public function user()
    {
        return $this->hasMany(Group::class);
    }
}
