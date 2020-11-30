<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    //Alternative text setter
    public function setAltAttribute($value)
    {
        $this->attributes['alt'] = $value ?? $this->attributes['title'];
    }

    // Relations
    public function imageable()
    {
        return $this->morphTo();
    }
}
