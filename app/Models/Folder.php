<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Folder extends Model implements Auditable
{
    use HasFactory;
    use AuditableTrait;

    protected $fillable = [
        'folder',
        'name',
        'path',
        'sort_order',
        'status',
        'created_by'
    ];

    public function parent()
    {
        return $this->belongsTo(Folder::class, 'folder');
    }

    public function children()
    {
        return $this->hasMany(Folder::class, 'folder');
    }

    public function files()
    {
        return $this->hasMany(File::class, 'folder');
    }
}


?>