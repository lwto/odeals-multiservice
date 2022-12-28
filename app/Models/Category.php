<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia,SoftDeletes;
    protected $table = 'categories';
    protected $fillable = [
        'name', 'description', 'is_featured', 'status' , 'color'
    ];

    protected $casts = [
        'status'    => 'integer',
        'is_featured'  => 'integer',
    ];

    public function services(){
        return $this->hasMany(Service::class, 'category_id','id');
    }
}
