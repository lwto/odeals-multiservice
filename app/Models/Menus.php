<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    use HasFactory;
    protected $table = 'menus';
    protected $fillable = [
        'title', 'nickname', 'url','url_params','icon','parent_id','menu_order','permission','status'
    ];
}
