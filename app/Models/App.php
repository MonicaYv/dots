<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class App extends Model implements Auditable
{
	 use AuditableTrait;
	 
    protected $fillable = ['name', 'icon', 'sort_order', 'status'];
}

?>