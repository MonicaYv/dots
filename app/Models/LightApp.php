<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class LightApp extends Model implements Auditable
{
	 use AuditableTrait;
	 
    protected $fillable = [
        'group', 'name', 'link', 'description', 'icon', 'open_type', 'width',
        'height', 'sort_order', 'status', 'add_app'
    ];

    public function category()
    {
        return $this->belongsTo(LightAppCategory::class, 'group');
    }
}

?>