<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Relations
    public function setSlugAttribute()
    {
        $uniqueNum = substr(Carbon::now()->getPreciseTimestamp(4),-7);
        $this->attributes['slug'] = Str::slug($this->attributes['title'])."-".$uniqueNum;
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

}
