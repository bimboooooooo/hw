<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = [];

    // Mutators
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $uniqueNum = substr(Carbon::now()->getPreciseTimestamp(4), -7);
        $this->attributes['slug'] = Str::slug($this->attributes['title']) . "-" . $uniqueNum;
    }

    // Relations
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
