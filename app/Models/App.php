<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    protected $fillable = ['name', 'icon', 'sort_order', 'status'];
}

?>