<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class File extends Model implements Auditable
{
    use HasFactory;
    use AuditableTrait;
    
    protected $fillable = [
        'name',
        'extension',
        'path',
        'folder',
        'sort_order',
        'status',
        'created_by'
    ];

    public function folder()
    {
        return $this->belongsTo(Folder::class, 'folder');
    }
}


?>