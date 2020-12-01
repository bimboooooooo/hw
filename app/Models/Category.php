<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $uniqueNum = substr(Carbon::now()->getPreciseTimestamp(4),-7);
        $this->attributes['slug'] = Str::slug($this->attributes['title'])."-".$uniqueNum;
    }
    //Relations
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }
}
