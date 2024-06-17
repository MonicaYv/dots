<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class LiteAppModel extends Model implements Auditable
{
    use HasFactory;
     use AuditableTrait;

         protected $table = 'light_app';

    protected $fillable = [
        'name',
        'website_link',
        'app_group',
        'app_description',
        'picture_icon',
        'open_type',
        'dialog_width',
        'dialog_height',
        'allow_width_adjustment',
        'minimilist_title_bar',
    ];

}
