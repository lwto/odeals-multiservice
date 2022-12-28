<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = "settings";
    protected $primaryKey = "id";
    protected $fillable = ['type','key','value'];
    public $timestamps = false;


    protected $casts = [
        'type' => 'string',
        'key'   => 'string',
        'value' => 'string',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class,'value','id')
            ->withDefault(function () { return (object) []; });
    }
}
