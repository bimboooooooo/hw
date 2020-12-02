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
    public $timestamps = false;

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $uniqueNum = substr(Carbon::now()->getPreciseTimestamp(9)%10000000000, -7);
        $this->attributes['slug'] = Str::slug($this->attributes['title']) . "-" . $uniqueNum;
    }

    // Relations
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

}
