<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class LightAppCategory extends Model implements Auditable
{
	 use AuditableTrait;
	 
    protected $fillable = ['name', 'sort_order', 'status'];

    public function lightApps()
    {
        return $this->hasMany(LightApp::class, 'group');
    }
}
?>